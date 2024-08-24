<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'number' => 'required|min:5',
            'message' => 'required|min:20',
        ]);

        // Save the contact form data to the database
        $contact = Contact::create($request->all());

        // Send an email to the admin
        Mail::to('alisufyan2410@gmail.com')->send(new ContactFormMail($request->all()));

        return response()->json(['success' => 'Your message has been sent successfully!']);
    }
}

