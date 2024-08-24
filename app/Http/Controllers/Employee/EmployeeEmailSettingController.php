<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use Illuminate\Http\Request;
use Validator;
use Auth;

class EmployeeEmailSettingController extends Controller
{ 
    public function index()
    {
        $settings = Auth::user()->emailSetting;
        $data = [
            'title' => 'Email Settings',
            'settings' => $settings  
        ];
        return view('employee.pages.email_settings.index', compact('data'));
    }

    public function create()
    {
        return view('employee.pages.email_settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mail_driver' => 'required|string|max:255',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|string|max:255',
            'mail_password' => 'required|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);

        $emailSetting = new EmailSetting($request->all());
        $emailSetting->user_id = Auth::id();
        $emailSetting->save();

        return redirect()->route('employee.email_settings.list')->with('success', 'Email Setting created successfully.');
    }

    public function edit($id)
    {
        $setting = EmailSetting::find($id);
        $data = [
            'title' => 'Email Settings',
            'emailSetting' => $setting 
        ];
        return view('employee.pages.email_settings.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {


        $request->validate([
            'mail_driver' => 'required|string|max:255',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer',
            'mail_username' => 'required|string|max:255',
            'mail_password' => 'required|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);
        $emailSetting = EmailSetting::find($id);
        $emailSetting->update($request->all());

        return redirect()->route('employee.email_settings.list')->with('success', 'Email Setting updated successfully.');
    }

    public function destroy($id)
    {
        $emailSetting = EmailSetting::find($id);
        $emailSetting->delete();

        return redirect()->route('employee.email_settings.list')->with('success', 'Email Setting deleted successfully.');
    }



}
