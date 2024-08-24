<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Models\User;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Validator;

class AdminWorkingHourController extends Controller
{
    public function index($id)
    {
        $workingHours = WorkingHour::where('employee_id' ,$id)->get();
        $employee = User::where('id' ,$id)->first();

        $data = [
            'title' => 'Working Hour',
            'workingHours' => $workingHours  ,
            'employee' => $employee  ,
        ];
        return view('admin.pages.workingHour', compact('data'));
    } 


    public function store(Request $request)
    {
        // $request->validate([
        //     'start_time' => 'required',
        //     'end_time' => 'required', 
        // ]);
        //   WorkingHour::create($request->all());

        foreach ($request->working_day as $key => $day) {
            $formData              = new WorkingHour();
            $formData->working_day = $day;
            $formData->working_on  = isset($request->working_on[$key]) ? 1 : 0;;
            $formData->start_time  = $request->start_time[$key];
            $formData->end_time    = $request->end_time[$key];
            $formData->employee_id = $request->employee_id;
            $formData->save();
        }

        return redirect()->back()->with('success', 'Working Hour added successfully.');
    }



    public function edit($id)
    {
        $Coupon = WorkingHour::find($id);
        return response()->json($Coupon);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $formData = WorkingHour::find($id);

        $formData->working_day = $request->working_day;
        $formData->working_on  = isset($request->working_on) ? 1 : 0;;
        $formData->start_time  = $request->start_time;
        $formData->end_time    = $request->end_time;

        $formData->update();
        toastr()->success('Working Hour updated successfully.');
        return  1;
    }

    
    public function destroy($id)
    {
        $WorkingHour = WorkingHour::find($id);
        $WorkingHour->delete();
        return redirect()->back()->with('success', 'Working Hour deleted successfully.');
    }




}
