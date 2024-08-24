<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;


class AdminContactController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $contacts = Contact::all();
         //
         $data = [
            'title' => 'Contacts',
            'contacts' => $contacts  
        ];

        return view('admin.pages.contact', compact('data'));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $record = Contact::find($id);
        if ($record->delete()) {
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found']);
        }
    }


}