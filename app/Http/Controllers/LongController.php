<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

     
    public function index()
    {
        //
        $data = [
            'title' => 'Long Term Parking',
        ];
        return view('front.pages.long_term_parking',compact('data'));
    }
    
    public function blog_details()
    {
        //
        $data = [
            'title' => 'Blog Detail',
        ];
        return view('front.pages.blog_details',compact('data'));
    }
    
      
}
