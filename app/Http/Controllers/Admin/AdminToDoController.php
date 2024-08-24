<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ToDoCard;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AdminToDoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'To Do',
        ];
        return view('admin.pages.ToDo', compact('data'));
    }


    public function fetchToDoCards()
    {
        $toDoCards = ToDoCard::where('user_id', Auth::id())->get();
        return response()->json($toDoCards);
    }

    public function card_store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $toDoCard = new ToDoCard();
        $toDoCard->user_id = Auth::id();
        $toDoCard->description = $request->description;
        $toDoCard->save();

        return response()->json($toDoCard);
    }
 

    public function card_completed(Request $request, $id)
    { 
        $toDoCard = ToDoCard::findOrFail($id);
        $toDoCard->completed = $request->completed;
        $toDoCard->save();
        return response()->json($toDoCard);
    }

    public function card_destroy($id)
    {
        $toDoCard = ToDoCard::find($id);
        $toDoCard->delete();

        return response()->json(['success' => 'To Do Card deleted successfully.']);
    }

    
    public function card_destroy_all()
    {
        ToDoCard::truncate(); 
        return response()->json(['success' => 'To Do Card deleted successfully.']);
    }




    // ==================================================================


    public function fetchToDoLists()
    {
        $toDoLists = ToDoList::where('user_id', Auth::id())->get();
        return response()->json($toDoLists);
    }

    public function list_store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $toDoCard = new ToDoList();
        $toDoCard->user_id = Auth::id();
        $toDoCard->description = $request->description;
        $toDoCard->save();

        return response()->json($toDoCard);
    }
 

    public function list_completed(Request $request, $id)
    { 
        $toDoCard = ToDoList::findOrFail($id);
        $toDoCard->completed = $request->completed;
        $toDoCard->save();
        return response()->json($toDoCard);
    }

    public function list_destroy($id)
    {
        $toDoCard = ToDoList::find($id);
        $toDoCard->delete();

        return response()->json(['success' => 'To Do List deleted successfully.']);
    }

    
    public function list_destroy_all()
    {
        ToDoList::truncate(); 
        return response()->json(['success' => 'To Do List deleted successfully.']);
    }















}
