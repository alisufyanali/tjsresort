<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation; 
use Auth;

class MemberPastReservationController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $userId = Auth::id();
        $reservations = Reservation::where('user_id' , $userId )->get();
        $data = [
            'title' => 'Reservation',
            'reservations' => $reservations  
        ];
        return view('member.pages.reservation',compact('data'));
    }

}