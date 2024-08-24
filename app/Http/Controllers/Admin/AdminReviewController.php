<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; 

class AdminReviewController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function index()
    {
         $reviews = Review::all();
         //
         $data = [
            'title' => 'Reviews',
            'reviews' => $reviews  
        ];

        return view('admin.pages.review', compact('data'));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $record = Review::find($id);
        if ($record->delete()) {
            return response()->json(['success' => 'Record deleted successfully']);
        } else {
            return response()->json(['error' => 'Record not found']);
        }
    }



    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->approved = 1;
        $review->save();

        return response()->json(['success' => true, 'message' => 'Approved successfully']);
    }

    public function disapprove($id)
    {
        $review = Review::findOrFail($id);
        $review->approved = 0;
        $review->save();

        return response()->json(['success' => true, 'message' => 'Unapproved successfully']);
    }


}