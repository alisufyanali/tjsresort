<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\HomepageContent;
use App\Models\HomepageTestimonial;
use App\Models\Blog;
use App\Models\Event;
use Carbon\Carbon;
use Session;

class HomeController extends Controller  
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locations = Location::where('featured' , 1)->limit(1)->get();
        $homeContent = HomepageContent::first();
        $HomeTestimonial = HomepageTestimonial::all();
        $events = Event::orderBy('start_date', 'desc')->limit(2)->get();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(2)->get();
        $data = [
            'title' => 'Home',
            'locations' => $locations,
            'homeContent' => $homeContent,
            'HomeTestimonial' => $HomeTestimonial,
            'events' => $events,
            'blogs' => $blogs,
        ];
        return view('front.pages.home',compact('data'));
    }


    public function contact()
    {
        //
        $data = [
            'title' => 'Contact Us',
        ];
        return view('front.pages.contact',compact('data'));
    }
    
    
    public function about()
    {
        //
        
        $homeContent = HomepageContent::first();
        $HomeTestimonial = HomepageTestimonial::all();
        $data = [
            'title' => 'About Us',
            'homeContent' => $homeContent,
            'HomeTestimonial' => $HomeTestimonial,
        ];
        return view('front.pages.about',compact('data'));
    }
    
    
 
    public function resort_search()
    {
        //
        $locations = Location::paginate(9);
        $data = [
            'title' => 'Location',
            'locations' => $locations
        ];
        return view('front.pages.location',compact('data'));
    }
  




    public function logouts () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}
