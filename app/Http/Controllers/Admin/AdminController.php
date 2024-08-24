<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 
use App\Models\Location;
use App\Models\Setting;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Auth;
use Hash;

class AdminController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin.home',compact('data'));
    }


    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('admin.pages.profile',compact('data'));
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

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
 
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([ 
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
 

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.profile')
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully.');
    }

    public function contactList()
    {
        //
        $data = [
            'title' => 'contact Lists',
            "lists" => Contact::get(),
        ];
        return view('admin.contactList',compact('data'));
    }

    public function subscribeList()
    {
        //
        $data = [
            'title' => 'NewsLetter Subscriber Lists',
            "lists" => Subscriber::get(),
        ];
        return view('admin.subscribeList',compact('data'));
    }
     
     
    public function propertyDelete($id)
    { 
        $record = Property::find($id);

        if ($record) {
            $record->delete(); // This soft deletes the record
            toastr()->warning('Record deleted successfully', 'warning');
        } else {
            toastr()->error('Record not found', 'Error');
        }

        return redirect()->back();

    }
 

    public function setting()
    {
        $userId = Auth::id();
        $setting = Setting::where('user_id', $userId)->first();
        return view('admin.pages.setting', ['setting' => $setting]);
    }

   public function setting_do(Request $request)
    { 
    
        $request->validate([
            'logo' => 'nullable|max:10000|mimes:jpeg,jpg,png,webp',
            'favicon' => 'nullable|max:10000|mimes:jpeg,jpg,png,webp',
            'sliders.*' => 'nullable|max:10000|mimes:jpeg,jpg,png,webp',
            'email' => 'nullable|email',
            'coming_soon_visible' => 'nullable|boolean',
        ]);
    
        $updateData = [
            'address' => $request->get('address'),
            'contact_no' => $request->get('contact_no'),
            'email' => $request->get('email'),
            'coming_soon_visible' => $request->get('coming_soon_visible')  ,
            'user_id' => Auth::id(),
            'meta_tags' => implode(',', $request->get('meta_tags', [])),
        ];
        // dd($updateData);
     
    
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = $logoFile->store('public/assets/img');
            $updateData['logo'] = $logoPath;
        }
    
        if ($request->hasFile('favicon')) {
            $faviconFile = $request->file('favicon');
            $faviconPath = $faviconFile->store('public/assets/img');
            $updateData['favicon'] = $faviconPath;
        }
    
        $existingSetting = Setting::where('user_id', Auth::id())->first();
        $existingSliders = $existingSetting ? explode(',', $existingSetting->sliders) : [];
    
        $sliderPaths = [];
        if ($request->hasFile('sliders')) {
            foreach ($request->file('sliders') as $key => $slider) {
                $sliderPath = $slider->store('public/assets/img/home-slider');
                $sliderPaths[] = $sliderPath;
            }
        }
    
        $allSliders = array_merge($existingSliders, $sliderPaths);
    
        if (!empty($allSliders)) {
            $updateData['sliders'] = implode(',', $allSliders);
        }
    
        try {
            // Setting::updateOrCreate(
            //     ['user_id' => Auth::id()],
            //     $updateData
            // );
            
            // Manually check if the setting exists and then update or create
            $setting = Setting::where('user_id', Auth::id())->first();
    
            if ($setting) {
                // Update existing record
                $setting->update($updateData);
            } else {
                // Create new record
                Setting::create($updateData);
            }
        
            return redirect()->back()->with('success', 'Setting Updated.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
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

    public function member_graph(){
        $member_Graph_by_date = DB::table('users')->where('user_type','member')
        ->selectRaw("(DATE_FORMAT(created_at, '%M')) as date, COUNT(*) as count")
        ->groupBy("date")
        ->orderBy('date', 'desc')
        ->get();
        $formattedData = [];
        foreach ($member_Graph_by_date as $data) {
            $formattedData[] = [
                'x' => $data->date,
                'y' => $data->count,
            ];
        }
        return response()->json($formattedData);
    }

    
}