<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class AdminEmployeeController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $employees = User::where('user_type','emp')->get();
         //
         $data = [
            'title' => 'Employees',
            'employees' => $employees  
        ];

        return view('admin.pages.employee', compact('data'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $formData   = new User();
        $formData->name   = $request->name;
        $formData->email   = $request->email;
        $formData->user_type   = 'emp';
        $formData->password   =  Hash::make($request->password);

        if($formData->save()){
            return response()->json(['status' => 'success', 'message' => 'Form submitted successfully']);
         }else{
            return response()->json(['status' =>  'danger' ,'message' => 'Somthing Wrong']);
         }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $formData   =  User::find($id);
        $formData->name   = $request->name;
        $formData->email   = $request->email;

        if ($request->filled('password')) {
            $formData->password   =  Hash::make($request->password);
        }

        if($formData->save()){
            return response()->json(['status' => 'success', 'message' => 'User Updated successfully']);
         }else{
            return response()->json(['status' =>  'danger' ,'message' => 'Somthing Wrong']);
         }

        return response()->json($location);
    }
















    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $location
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $record = User::find($id);
        if ($record->delete()) {
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found']);
        }
    }


}