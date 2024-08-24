<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 

class AdminMemberController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $members = User::where('user_type','member')->get();
         //
         $data = [
            'title' => 'Members',
            'members' => $members  
        ];

        return view('admin.pages.member', compact('data'));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
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