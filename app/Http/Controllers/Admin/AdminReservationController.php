<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation; 

class AdminReservationController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $reservations = Reservation::all();
         //
         $data = [
            'title' => 'Reservation',
            'reservations' => $reservations  
        ];

        return view('admin.pages.reservation', compact('data'));
    }
 



    public function show($id)
    {
         $reservation = Reservation::find($id);
         //
         $data = [
            'title' => 'Reservation',
            'reservation' => $reservation  
        ];

        return view('admin.pages.reservationView', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $record = Reservation::find($id);
        if ($record->delete()) {
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found']);
        }
    }


}