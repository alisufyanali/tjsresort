<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Http\Request;
use Validator;

class AdminEventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        $data = [
            'title' => 'event',
            'events' => $event  
        ];

        return view('admin.pages.event', compact('data'));
    }

    
    public function create()
    {
        $data = [
            'title' => 'event',
        ];

        return view('admin.pages.eventCreate', compact('data'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'open_time' => 'required',
            'start_date' => 'required',
            'title' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'description' => 'required',
            'more_about_event' => 'required',
            'image' => 'required|image',
        ]);

        $event = new Event($request->all());
        if ($request->hasFile('image')) {
            $imageName =  time() . '.'.$request->image->extension();  
            $request->image->move(public_path('assets/img/event'), $imageName);
            $event->image   = $imageName;
        }
        $event->save();

        return redirect()->route('admin.event.list')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $data = [
            'title' => 'event',
            'event' => $event  
        ];

        return view('admin.pages.eventEdit', compact('data'));

    }

    public function update(Request $request,  Event $event)
    {
        $request->validate([
            'open_time' => 'required',
            'close_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'title' => 'required',
            'location' => 'required',
            'schedule' => 'required',
            'description' => 'required',
            'more_about_event' => 'required',
            'image' => 'image',
        ]);

        $event->fill($request->all());
        if ($request->hasFile('image')) {
            $imageName =  time() . '.'.$request->image->extension();  
            $request->image->move(public_path('assets/img/event'), $imageName);
            $event->image   = $imageName;
        }
        $event->save();

        return redirect()->route('admin.event.list')->with('success', 'Event updated successfully.');
    }

    
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success' => 'event deleted successfully.']);
    }



}
