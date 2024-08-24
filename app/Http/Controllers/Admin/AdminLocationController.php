<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 
use App\Models\Subscriber;
use App\Models\Property; 
use App\Models\Image; 
use App\Models\Location;
use App\Models\Price;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminLocationController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $locations = Location::all();
         $data = [
            'title' => 'Locations',
            'locations' => $locations  
        ];

        return view('admin.pages.location', compact('data'));
    }
 
    public function create()
    {
         //
         $data = [
            'title' => 'Locations Create',
        ];

        return view('admin.pages.Addlocation', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            // 'per_night_charges' => 'required|numeric',
            'total_spaces' => 'required|numeric',
            'description' => 'nullable|string',
            'location_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_services' => 'nullable|string',
            'daily' => 'required|numeric',
            'weekly' => 'required|numeric',
            'monthly' => 'required|numeric',
            'oversized_price' => 'required|numeric',
        ]);

        $formData   = new Location();
        $formData->location_name   = $request->location_name;
        $formData->per_night_charges   = $request->daily;
        $formData->total_spaces   = $request->total_spaces;
        $formData->description   = $request->description;
        $formData->location_services   = $request->location_services;

        $imageName = 'featured_'  . $request->location_name .'_'. time() . '.'.$request->featured_image->extension();  
        $request->featured_image->move(public_path('assets/img/location'), $imageName);
        $formData->featured_image   = $imageName;

        // Process each image 
        if ($request->hasFile('location_images')) {
            $imageDataArray = []; // Array to store image names
            foreach ($request->file('location_images') as $key => $image) {
                // Generate a unique name for each image
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Ensure the destination directory exists
                $destinationPath = public_path('assets/img/location');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true); // Create directory if it doesn't exist
                }
                // Move the image to the public folder
                $image->move($destinationPath, $imageName);
                // Store the image name in the array
                $imageDataArray[] = $imageName;
            }
            // Save the JSON string to the form data
            $formData->location_images = $imageDataArray;
        } else {
            $formData->location_images = null; // Set to null if no images are uploaded
        }

        $formData->slug = Str::slug($request->location_name);

        if($request->featured =='on' ){
            $formData->featured = 1;
        }else{
            $formData->featured = 0;
        }
        $formData->daily = $request->daily;
        $formData->weekly = $request->weekly;
        $formData->monthly = $request->monthly;

 
        if($formData->save() ){
            return redirect()->back()->with('success', 'Location Added successfully.');
        }else{
            return response()->json(['status' =>  'danger' ,'message' => 'Somthing Wrong']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = location::find($id);
        $data = [
            'title' => 'Locations Edit',
            'location' => $location
        ];

        return view('admin.pages.Editlocation', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            // 'per_night_charges' => 'required|numeric',
            'total_spaces' => 'required|numeric',
            'description' => 'nullable|string',
            'location_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_services' => 'nullable|string',
            'daily' => 'required|numeric',
            'weekly' => 'required|numeric',
            'monthly' => 'required|numeric',
            'oversized_price' => 'required|numeric',
        ]);

        $formData                     =  Location::find($id);
        $formData->location_name      = $request->location_name;
        $formData->per_night_charges  = $request->daily;
        $formData->total_spaces       = $request->total_spaces;
        $formData->description        = $request->description;
        $formData->location_services  = $request->location_services;

        if ($request->hasFile('featured_image')) {
            $imageName = 'featured_'  . $request->location_name .'.'.$request->featured_image->extension();  
            $request->featured_image->move(public_path('assets/img/location'), $imageName);
            $formData->featured_image   = $imageName;
        }

        $images = null ;
        // Process each image
        if ($request->hasFile('location_images')) {
           $imageDataArray = []; // Empty array to store image data
           foreach ($request->file('location_images') as $key => $image) {
               $imageName = time() . '_' . $image->getClientOriginalName();
               // Image ko public folder mein save karta hai
               $image->move(public_path('assets/img/location'), $imageName);
               $imageDataArray[] =   $imageName ;
           }
           // Image data ko JSON string mein convert karta hai
           $images = json_encode($imageDataArray);
           $formData->location_images   = $images;
        }
        
        if($request->featured =='on' ){
            $formData->featured = 1;
        }else{
            $formData->featured = 0;
        }
        $formData->daily = $request->daily;
        $formData->weekly = $request->weekly;
        $formData->monthly = $request->monthly;

        if($formData->save()){
            return redirect()->back()->with('success', 'Location Updated successfully.');
         }else{
            return response()->json(['status' =>  'danger' ,'message' => 'Somthing Wrong']);
         }

        return response()->json($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Location::find($id);
        if ($record->delete()) {
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found']);
        }
    }


}