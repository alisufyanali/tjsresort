<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Review;
use DB;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

     
    public function locations(Request $request)
    {
        //
        if(isset($request->search)){
            $locations = Location::where('location_name', 'like', '%' . $request->search . '%')->paginate(9);
        }else{
            $locations = Location::paginate(9);
        }
        $data = [
            'title' => 'Locations',
            'locations' => $locations,
        ];
        return view('front.pages.location',compact('data'));
    }
    
    public function location_detail($slug)
    {
        $location = Location::where('slug' , $slug)->first();
        $reviews = Review::where('location_id' , $location['id'])
                         ->where('approved' , 1)->get();
       
        $data = [
            'title' => 'Location Detail',
            'location' => $location,
            'reviews' => $reviews,
        ];
        return view('front.pages.location_detail',compact('data'));
    }
    

    public function review_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'message' => 'required|string',
        ]);



        $existingReview = Review::where('email', $request->email)
                                 ->where('location_id', $request->location_id)
                                 ->first();

        if ($existingReview) {
            return response()->json(['error' => 'You have already reviewed this location.'], 400);
        }
        
        Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'message' => $request->message,
            'location_id' => $request->location_id,
        ]);

        return response()->json(['success' => 'Review submitted successfully!']);
    }



    // public function checkAvailability(Request $request)
    // {

    //     $dateIn           =  $request->input('date_in') ;
    //     $dateOut          =  $request->input('date_out') ;
    //     $price            =  $request->input('price') ;
    //     $number_of_spaces =  $request->input('number_of_spaces') ;
    //     $nights = 0 ;
       
    //     $locations = Location::join('reservations', 'reservations.location_id', '=', 'locations.id')
    //                 ->join('prices', 'prices.location_id', '=', 'locations.id')
    //                 ->select('locations.*', DB::raw('SUM(reservations.number_of_spaces) as total_booked_spaces'))
    //                 ->groupBy('locations.id')
    //                 ->havingRaw('locations.total_spaces >= total_booked_spaces + ?', [$number_of_spaces])
    //                 ->where(function ($query) use ($price) {
    //                     if ($price != null) {
    //                         $query->where('prices.daily', '>=', $price)
    //                             ->orWhere('prices.weekly', '>=', $price)
    //                             ->orWhere('prices.monthly', '>=', $price);
    //                     }
    //                 })
    //                 ->where(function ($query) use ($dateIn, $dateOut) {
    //                     $query->where('reservations.date_in', '>=', $dateIn)
    //                         ->orWhere('reservations.date_out', '<=', $dateOut);
    //                 })
    //                 ->paginate(9);

        
    //     $data = [
    //         'title' => 'Locations',
    //         'locations' => $locations,
    //     ];
    //     return view('front.pages.location',compact('data'));
    // }



    public function checkAvailability(Request $request)
    {
        $dateIn = $request->input('date_in');
        $dateOut = $request->input('date_out');
        $price = $request->input('price');
        $number_of_spaces = $request->input('number_of_spaces');
    
        // Initial query
        $locations = Location::join('reservations', 'reservations.location_id', '=', 'locations.id')
            ->join('prices', 'prices.location_id', '=', 'locations.id')
            ->select(
                'locations.id',
                'locations.location_name',
                'locations.total_spaces',
                DB::raw('SUM(reservations.number_of_spaces) as total_booked_spaces')
            )
            ->groupBy(
                'locations.id',
                'locations.location_name',
                'locations.total_spaces'
            )
            ->havingRaw('locations.total_spaces >= total_booked_spaces + ?', [$number_of_spaces]);
    
        // Apply price filter if price is provided
        if ($price !== null) {
            $locations = $locations->where(function ($query) use ($price) {
                $query->where('prices.daily', '>=', $price)
                      ->orWhere('prices.weekly', '>=', $price)
                      ->orWhere('prices.monthly', '>=', $price);
            });
        }
    
        // Apply date filters
        if ($dateIn && $dateOut) {
            $locations = $locations->where(function ($query) use ($dateIn, $dateOut) {
                $query->where('reservations.date_in', '>=', $dateIn)
                      ->orWhere('reservations.date_out', '<=', $dateOut);
            });
        }
    
        // Paginate results
        $locations = $locations->paginate(9);
    
        $data = [
            'title' => 'Locations',
            'locations' => $locations,
        ];
    
        return view('front.pages.location', compact('data'));
    }











}
