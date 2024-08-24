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
        $user_data =  Session::get('user_data');
        // dd($storedReservation , $user_data); 
        
        if(isset($storedReservation)){
            $location = Location::find($storedReservation['location_id']);
            // dd($location, $storedReservation);
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
            'date_in'           => 'required',
            'date_out'          => 'required',
            'truck_number'      => 'required|string',
            'truck_color'       => 'required|string',
            'number_of_spaces'  => 'required|integer',
            'total_price'       => 'required|numeric',
            'oversized'         => 'required'
        ]);


        // Check available spaces
        $totalBookedSpaces = Reservation::where('location_id', $request->location_id)
            ->where(function ($query) use ($request) {
                $query->where('date_in', '>=', $request->date_in)
                      ->orWhere('date_out', '<=', $request->date_out);
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
        $dateIn  =  $request->input('date_in') ;
        $dateOut =  $request->input('date_out') ;
        $location_id =  $request->input('location_id') ;
        $nights = 0 ;
        Session::flush();

        // Assuming 'Y-m-d' is the format of your date input
        $to = Carbon::createFromFormat('Y-m-d', $request->input('date_in'));
        $from = Carbon::createFromFormat('Y-m-d', $request->input('date_out'));

        $nights = $to->diffInDays($from);


        // Create reservation array
        $reservation = [
            'date_in' => $dateIn,
            'date_out' => $dateOut,
            'truck_number' => $request->input('truck_number'),
            'truck_color' => $request->input('truck_color'),
            'number_of_spaces' => $request->input('number_of_spaces'),
            'total_price' => $request->input('total_price'),
            'nights' => $nights,
            'location_id' => $request->input('location_id'),
        ];

        // Store reservation array in session
        Session::put('reservation', $reservation);

        return redirect()->route('checkout');

        // // Save reservation to database
        // $reservation                    = new Reservation();
        // $reservation->date_in           = $dateIn ;
        // $reservation->date_out          = $dateOut ;
        // $reservation->truck_number      = $request->input('truck_number');
        // $reservation->truck_color       = $request->input('truck_color');
        // $reservation->number_of_spaces  = $request->input('number_of_spaces');
        // $reservation->total_price       = $request->input('total_price');
        // $reservation->nights            = $nights   ; // Store calculated nights
        
        // if($reservation->save()){
        //     return response()->json(['status' => 'success', 'message' => 'Reservation successful']);
        // }else{
        //     return response()->json(['status' => 'error', 'message' => 'Something Went Wrong']);
        // }
    }



    
    // public function reserved_pay(Request $request)
    // {


    //     try {
    //         $storedReservation =  Session::get('reservation'); 
            
    //         $location = Location::find($storedReservation['location_id']);

    //         $stripe = new \Stripe\StripeClient(config('services.stripe.secret') );

    //         $redirectUrl = route('index');
    //         $response = $stripe->checkout->sessions->create([
    //             'success_url' => $redirectUrl,
    //             'cancel_url' => route('checkout'),
    //             'customer_email' => $request->email , // Assuming you want to use the logged-in user's email
    //             'payment_method_types' => ['card'], // Remove 'link' if not needed
    //             'line_items' => [
    //                 [
    //                     'price_data' => [
    //                         'product_data' => [
    //                             'name' => $storedReservation['truck_number'] .' Reservation at ' . $location->location_name, // Replace with your product name
    //                         ],
    //                         'unit_amount' => 100 * $request->amount , // Assuming price is in cents
    //                         'currency' => 'USD',
    //                     ],
    //                     'quantity' => 1,
    //                 ],
    //             ],
    //             'mode' => 'payment',
    //             'allow_promotion_codes' => true,
    //         ]);


    //         $user_id = $this->createMember($request->name , $request->email , 'admin123' );

    //         //  // Save reservation to database
    //         $reservation                    = new Reservation();
    //         $reservation->date_in           = $storedReservation['date_in'] ;
    //         $reservation->date_out          = $storedReservation['date_out'] ;
    //         $reservation->truck_number      = $storedReservation['truck_number'];
    //         $reservation->truck_color       = $storedReservation['truck_color'];
    //         $reservation->number_of_spaces  = $storedReservation['number_of_spaces'];
    //         $reservation->total_price       = $storedReservation['total_price'];
    //         $reservation->grand_price       = $request->amount;
    //         $reservation->nights            = $storedReservation['nights'];
    //         $reservation->location_id       = $storedReservation['location_id'];
    //         $reservation->coupon_id         = $request->coupon_id;
    //         $reservation->user_id           = $user_id;
    //         $reservation->stripe_response   = $response->id;

    //         $reservation->save();
    //         return redirect($response['url']);


        
    //     } catch (\Exception $ex) {
    //         return redirect()->back()->with('error',  $ex->getMessage());
    //     }
    // }



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
                                'name' => $storedReservation['truck_number'] .' Reservation at ' . $location->location_name,
                            ],
                            'unit_amount' => 100 * $request->amount, // Assuming price is in cents
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
                'amount' => $request->amount,
                'coupon_id' => $request->coupon_id
            ]);


            // Store in cache
            $userData =  [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'amount' => $request->amount,
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
