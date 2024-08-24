<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeOffRequest; 
use App\Models\WorkingHour; 
use Auth;

class EmployeeTimeOffController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     

    public function index()
    {
        $user = Auth::user();
        $timeOffRequests = TimeOffRequest::where('employee_id', $user->id)->get();
        $data = [
            'title' => 'Time Off',
            'timeOffRequests' => $timeOffRequests,  
        ];
        return view('employee.pages.timeOff',compact('data'));
    }

    public function requestTimeOff(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'required',
        ]);

        $timeOffRequest = new TimeOffRequest();
        $timeOffRequest->employee_id = Auth::id();
        $timeOffRequest->start_date = $request->start_date;
        $timeOffRequest->end_date = $request->end_date;
        $timeOffRequest->reason = $request->reason;
        $timeOffRequest->save();

        return redirect()->back()->with('success', 'Time off request submitted.');
    }


    
    public function workingHours()
    {
        $user = Auth::user();
        $workingHours = WorkingHour::where('employee_id', $user->id)->get();
        $data = [
            'title' => 'Time Off',
            'workingHours' => $workingHours  
        ];
        return view('employee.pages.workingHours',compact('data'));
    }
}