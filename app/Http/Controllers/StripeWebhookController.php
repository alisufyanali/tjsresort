<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Location;
use App\Models\User;
use App\Mail\ReservationConfirmed;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

use Session;


class StripeWebhookController extends Controller
{
      
    public function handleWebhook(Request $request)
    {
        // Log entire request
        Log::info('Webhook Request', [
            'headers' => $request->headers->all(),
            'body' => $request->getContent()
        ]);

        $endpoint_secret = config('services.stripe.webhook_secret');

        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

            if ($event['type'] == 'checkout.session.completed') {
                $session = $event['data']['object'];

                // Retrieve data from cache
                $storedReservation = Cache::get('reservation');
                $user_data = Cache::get('user_data');

                if ($storedReservation && $user_data) {
                    $user_id = User::where('email', $user_data['email'])->value('id');
                    if (!$user_id) {
                        $user_id = $this->createMember($user_data['name'], $user_data['email'], $user_data['phone'], 'member123');
                    }
                    $reservation = new Reservation();
                    $reservation->date_in       = $storedReservation['date_in'];
                    $reservation->date_out      = $storedReservation['date_out'];
                    $reservation->total_price   = $storedReservation['total_price'];
                    $reservation->grand_price   = $user_data['amount'];
                    $reservation->nights        = $storedReservation['nights'];
                    $reservation->location_id   = $storedReservation['location_id'];
                    $reservation->coupon_id     = $user_data['coupon_id'];
                    $reservation->truck_number  = $storedReservation['truck_number'];
                    $reservation->truck_color   = $storedReservation['truck_color'];
                    $reservation->number_of_spaces  = $storedReservation['no_of_spaces'];
                    $reservation->over_sized    = $storedReservation['over_sized'];
                    $reservation->user_id       = $user_id;
                    $reservation->stripe_response =   0  ;
                    $reservation->save();

                    $user = User::find($user_id);
                    // Mail::to($user->email)->send(new ReservationConfirmed($reservation, $user));

                    // Clear cache data
                    Cache::forget('reservation');
                    Cache::forget('user_data');
                    session()->forget(['reservation', 'stripe_session_id', 'user_data']);
                } else {
                    Log::warning('Session data is missing or invalid.');
                }
            }


            return response()->json(['status' => 'success']);
        } catch (\UnexpectedValueException $e) {
            Log::error('Invalid payload', ['exception' => $e]);
            return response()->json(['status' => 'error', 'message' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Invalid signature', ['exception' => $e]);
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
        }
    }

    public function createMember($name, $email, $phone , $password)
    {
        $formData = new User();
        $formData->name = $name;
        $formData->email = $email;
        $formData->phone = $phone;
        $formData->user_type = 'member';
        $formData->password = Hash::make($password);
        $formData->save();

        return $formData->id;
    }
}