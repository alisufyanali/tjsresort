<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use App\Models\Event;
use Illuminate\Http\Request;
use Validator;

class EmployeeEventController extends Controller
{
    
    public function index()
    {
        $events = Event::get();

        $data = [
            'title' => 'Events',
            'events' => $events  
        ];
        return view('employee.pages.events.index', compact('data'));
    }
 
    public function show(Event $event)
    {
        return view('employee.pages.events.show', compact('event'));
    }


}
