<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

use App\Models\Coupon;  
use App\Models\Location;  
use App\Models\Reservation;  
use App\Models\User;  

class ReservationController extends Controller
{
   
    
    public function checkout()
    {
        $storedReservation =  Session::get('reservation'); 
        // dd($storedReservation);
        if(isset($storedReservation)){
            $location = Location::find($storedReservation['location_id']);
           
            $data = [
                'title' => 'checkout',
                'reservation' => $storedReservation,
                'location' => $location,
            ];
            return view('front.pages.checkout',compact('data'));
        } else{
            return redirect()->route('locations')->with('error', 'Location Select First.');;
        }
    }
 

    public function reserved_validation(Request $request)
    {
        $validatedData = $request->validate([
            'arrival_date'   => 'required',
            'departure_date' => 'required',
            'truck_color'    => 'required',
            'truck_number'   => 'required',
            'no_of_spaces'   => 'required|integer',
        ]);

        return response()->json([ 'status' => 'success' ]);

        // Check available spaces
        $totalBookedSpaces = Reservation::where('location_id', $request->location_id)
            ->where(function ($query) use ($request) {
                $query->where('date_in', '>=', $request->arrival_date)
                      ->orWhere('date_out', '<=', $request->departure_date);
            })
            ->sum('number_of_spaces');

        $location = Location::find($request->location_id);
        $avl_space = (int)$location->total_spaces - $totalBookedSpaces ;

        if ((int)$location->total_spaces <= $totalBookedSpaces + $request->number_of_spaces) {
            return response()->json([ 'status' => 'error' ,  'message' => $avl_space . ' Space Avaliable.']);
        }else{
            return response()->json([ 'status' => 'success' ]);
        }
         
    }

    public function reserved_location(Request $request)
    {    
        $nights = 0 ;
        Session::flush();

        // Assuming 'Y-m-d' is the format of your date input
        $to = Carbon::createFromFormat('Y-m-d', $request->input('arrival_date'));
        $from = Carbon::createFromFormat('Y-m-d', $request->input('departure_date'));
        $nights = $to->diffInDays($from);

        $reservation = [
            'date_in'       => $request->input('arrival_date'),
            'date_out'      => $request->input('departure_date'),
            'truck_color'   => $request->input('truck_color'),
            'truck_number'  => $request->input('truck_number'),
            'no_of_spaces'  => $request->input('no_of_spaces'),
            'over_sized'    => $request->input('over_sized'),
            'nights'        => $nights,
            'location_id'   => $request->input('location_id'),
        ];

        $location = Location::find($request->input('location_id'));

        if($nights ==  0){
            $reservation['total_price'] = $location->daily  * $request->input('no_of_spaces');
        }elseif($nights >= 1 ){
            $reservation['total_price'] = ($location->daily * $nights ) * $request->input('no_of_spaces');
        }elseif($nights >= 7 ){
            $reservation['total_price'] = $location->weekly   * $request->input('no_of_spaces');
        }elseif($nights >= 30 ){
            $reservation['total_price'] = $location->montly   * $request->input('no_of_spaces');
        }


        // Store reservation array in session
        Session::put('reservation', $reservation);

        return redirect()->route('checkout');
 
    }



    
    
    public function reserved_pay(Request $request)
    {
        try {
            $storedReservation =  Session::get('reservation'); 

            $location = Location::find($storedReservation['location_id']);
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

            $redirectUrl = route('confirmation');
            $response = $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'cancel_url' => route('checkout'),
                'customer_email' => $request->email,
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => 'Resort Reservation at ' . $location->location_name,
                            ],
                            'unit_amount' => 100 *  $request->amount, // Assuming price is in cents
                            'currency' => 'USD',
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => true,
            ]);

            // Store necessary details to the session
            Session::put('stripe_session_id', $response->id);
            Session::put('user_data', [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'amount' => $request->total_price,
                'coupon_id' => $request->coupon_id
            ]);

            // Store in cache
            $userData =  [
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'amount'    => $request->amount,
                'coupon_id' => $request->coupon_id
            ];

            Cache::put('reservation', $storedReservation, 600); // Store for 10 minutes
            Cache::put('user_data', $userData, 600);
            return redirect($response['url']);
        } catch (\Exception $ex) {
            return redirect()->back()->with('error',  $ex->getMessage());
        }
    }

    
    
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');

        $coupon = Coupon::where('code' , $couponCode )->where('expiry_date','>=' , date('Y-m-d') )->get();
        
        if ( isset($coupon) && count($coupon) > 0 ) {
            return response()->json(['success' => true, 'discount' => $coupon[0]->discount ,'id' => $coupon[0]->id  ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code.']);
        }
    }


    public function createMember($name , $email ,$password ){
        
        $formData   = new User();
        $formData->name   = $name;
        $formData->email   = $email;
        $formData->user_type   = 'member';
        $formData->password   =  Hash::make($password);
        $formData->save();
        return $formData->id; // Return the ID of the newly created user
    }




    
    public function confirmation()
    {
        $reservation = Reservation::latest()->first();

             $data = [
                'title' => 'confirmation',
                'reservation' => $reservation,
            ];
            return view('front.pages.confirmation',compact('data'));
         
    }
 
    
}
