<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Validator;

class AdminEventCalendarController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        $data = [
            'title' => 'Event Calendar',
            'coupons' => $coupons  
        ];

        return view('admin.pages.eventcalendar', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $coupon = Coupon::create($request->all());

        return response()->json(['success' => 'Coupon added successfully.', 'coupon' => $coupon]);
    }

    public function edit($id)
    {
        $Coupon = Coupon::find($id);
        return response()->json($Coupon);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code,' . $id,
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $coupon = Coupon::find($id);
        $coupon->update($request->all());
        return response()->json(['success' => 'Coupon updated successfully.', 'coupon' => $coupon]);
    }

    
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return response()->json(['success' => 'Coupon deleted successfully.']);
    }



}
