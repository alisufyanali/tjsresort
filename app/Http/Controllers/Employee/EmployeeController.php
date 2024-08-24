<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 

use Illuminate\Support\Facades\DB;
use Auth;
use Hash;
use Storage;

class EmployeeController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('employee.home',compact('data'));
    }


    


    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('employee.pages.profile',compact('data'));
    }


    public function profile_update(Request $request)
    {
        $user = Auth::user();

        $request->validate([ 
             'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('profile')) {
            if ($user->profile) {
                Storage::delete($user->profile);
            }
            $path = $request->file('profile')->store('public/profiles');
            $user->profile = $path;
        }

        $user->save();

        return redirect()->route('employee.profile')->with('success', 'Profile updated successfully.');
    }
 
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([ 
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
 

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('employee.profile')
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('employee.profile')->with('success', 'Password updated successfully.');
    }


    public function reservation_graph(){
        $reservation_Graph_by_date = DB::table('reservations')
        ->selectRaw("(DATE_FORMAT(created_at, '%M')) as date, COUNT(*) as count")
        ->groupBy("date")
        ->orderBy('date', 'desc')
        ->get();
        $formattedData = [];
        foreach ($reservation_Graph_by_date as $data) {
            $formattedData[] = [
                'x' => $data->date,
                'y' => $data->count,
            ];
        }
        return response()->json($formattedData);
    }

}