<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use Webklex\IMAP\Facades\Client;

use App\Models\Email;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\SendAdminEmail;
use Auth;

class EmployeeEmailController extends Controller
{
    
    
    public function index()
    {
        $client = Client::account('default');
        $client->connect();
        $inbox = $client->getFolder('INBOX');
        $messages = $inbox->messages()->all()->get();

        $data = [
            'title' => 'Email',
            'messages' => $messages
        ];

        return view('employee.pages.email', compact('data'));
    }

    public function show($id)
    {
        $message = '';
        try {
            $client = Client::account('default');
            $client->connect();

            $inbox = $client->getFolder('INBOX');
            $message = $inbox->messages()->getMessageByUid($id);

        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'IMAP connection failed: ' . $e->getMessage()]);
        }


        $data = [
            'title' => 'Email Detail',
            'message' => $message
        ];

        return view('employee.pages.emailDetail', compact('data'));

    }


    public function compose()
    {

        $data = [
            'title' => 'Email'
        ];

        return view('employee.pages.emailCompose', compact('data'));
    }


    public function fetchEmails()
    {
        $emails = Email::all();
        return response()->json($emails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'recipient' => 'required|email',
            // 'cc' => 'nullable|email',
            // 'bcc' => 'nullable|email',
        ]);

        $email            = new Email();
        $email->subject   = $request->subject;
        $email->body      = $request->body;
        $email->recipient = $request->recipient;
        $email->cc        = $request->cc;
        $email->bcc       = $request->bcc;
        $email->save();

        // Fetch email settings from the database
        $emailSetting = Auth::user()->emailSetting;

        Config::set('mail.mailers.smtp.transport', $emailSetting->mail_driver);
        Config::set('mail.mailers.smtp.host', $emailSetting->mail_host);
        Config::set('mail.mailers.smtp.port',  $emailSetting->mail_port);
        Config::set('mail.mailers.smtp.username', $emailSetting->mail_username);
        Config::set('mail.mailers.smtp.password', $emailSetting->mail_password);
        Config::set('mail.mailers.smtp.encryption', $emailSetting->mail_encryption);
        Config::set('mail.from.address', $emailSetting->mail_from_address);
        Config::set('mail.from.name', $emailSetting->mail_from_name);
         
        try {
            $message = Mail::to($email->recipient);
            if (!empty($email->cc)) {
                $message->cc($email->cc);
            }
            if (!empty($email->bcc)) {
                $message->bcc($email->bcc);
            }
            $message->send(new SendAdminEmail($email));
        
            return redirect()->back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Mail sending failed: ' . $e->getMessage(), [
                'email' => $email,
                'exception' => $e
            ]);
            return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()], 500);
        }
        return response()->json($email);
 
    }
 

    public function destroy($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();

        return response()->json(['success' => 'Email deleted successfully.']);
    }


    public function sent()
    {

        $emails = Email::get();

        $data = [
            'title' => 'Email Sent' ,
            'emails' => $emails,
        ];

        return view('employee.pages.emailSent', compact('data'));
    }


    public function view($id)
    {

        $email = Email::find($id);

        $data = [
            'title' => 'Email View' ,
            'email' => $email,
        ];

        return view('employee.pages.emailView', compact('data'));
    }



    public function draft()
    {

        $data = [
            'title' => 'Email Draft'
        ];

        return view('employee.pages.emailDraft', compact('data'));
    }

    public function trash()
    {

        $data = [
            'title' => 'Email Trash'
        ];

        return view('employee.pages.emailTrash', compact('data'));
    }

}