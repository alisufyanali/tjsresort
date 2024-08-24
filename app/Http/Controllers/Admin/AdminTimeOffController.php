<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Models\TimeOffRequest;

use Illuminate\Http\Request;
use Validator;

class AdminTimeOffController extends Controller
{
    public function index()
    {
        $timeOffRequests = TimeOffRequest::get();

        $data = [
            'title' => 'Time Off Requests',
            'timeOffRequests' => $timeOffRequests  
        ];

        return view('admin.pages.timeOffRequests', compact('data'));
    }

    public function approveTimeOff($id)
    {
        $timeOffRequest = TimeOffRequest::find($id);
        $timeOffRequest->status = 'approved';
        $timeOffRequest->save();

        return redirect()->back()->with('success', 'Time off request approved.');
    }

    public function declineTimeOff($id)
    {
        $timeOffRequest = TimeOffRequest::find($id);
        $timeOffRequest->status = 'declined';
        $timeOffRequest->save();

        return redirect()->back()->with('success', 'Time off request declined.');
    }
}
