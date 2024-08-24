<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Validator;

class AdminHomepageContentController extends Controller
{
    public function index()
    {
        $content = HomepageContent::first();
        $data = [
            'title' => 'HomepageContents',
            'content' => $content  
        ];

        return view('admin.pages.homepage_content.index', compact('data'));
    }
    
    public function create()
    {
        $content = HomepageContent::all();
        $data = [
            'title' => 'HomepageContents Create',
            'content' => $content  
        ];

        return view('admin.pages.homepage_content.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_heading' => 'nullable|string',
            'sub_heading' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'intro_decs' => 'nullable|string',
            'intro_icon_1' => 'nullable|string',
            'intro_icon_2' => 'nullable|string',
            'intro_icon_3' => 'nullable|string',
            'intro_img_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'intro_img_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us' => 'nullable|string',
            'why_us_services' => 'nullable|string',
            'why_us_img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us_img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us_img_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'virtual_link' => 'nullable|string',
            'virtual_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $homepageContent = new HomepageContent();
        $homepageContent->main_heading = $request->main_heading;
        $homepageContent->sub_heading = $request->sub_heading;
        $homepageContent->intro_decs = $request->intro_decs;
        $homepageContent->why_us = $request->why_us;
        $homepageContent->why_us_services = $request->why_us_services;
        $homepageContent->virtual_link = $request->virtual_link;
        
        $homepageContent->intro_icon_1 = $request->intro_icon_1;
        $homepageContent->intro_icon_2 = $request->intro_icon_2;
        $homepageContent->intro_icon_3 = $request->intro_icon_3;

        $homepageContent->intro_name_1 = $request->intro_name_1;
        $homepageContent->intro_name_2 = $request->intro_name_2;
        $homepageContent->intro_name_3 = $request->intro_name_3;
    

        if ($request->hasFile('banner')) {
            $homepageContent->banner = $request->file('banner')->store('images', 'public');
        }
        if ($request->hasFile('intro_img_back')) {
            $homepageContent->intro_img_back = $request->file('intro_img_back')->store('images', 'public');
        }
        if ($request->hasFile('intro_img_front')) {
            $homepageContent->intro_img_front = $request->file('intro_img_front')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_1')) {
            $homepageContent->why_us_img_1 = $request->file('why_us_img_1')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_2')) {
            $homepageContent->why_us_img_2 = $request->file('why_us_img_2')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_3')) {
            $homepageContent->why_us_img_3 = $request->file('why_us_img_3')->store('images', 'public');
        }
        if ($request->hasFile('virtual_img')) {
            $homepageContent->virtual_img = $request->file('virtual_img')->store('images', 'public');
        }
    
        $homepageContent->save();
    
        return redirect()->route('admin.homepage_content.list')->with('success', 'Content added successfully');
    }
    public function edit($id)
    {
        $content = HomepageContent::find($id);
        $data = [
            'title' => 'HomepageContents Edit',
            'content' => $content  
        ];

        return view('admin.pages.homepage_content.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_heading' => 'nullable|string',
            'sub_heading' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'intro_decs' => 'nullable|string',
            'intro_icon_1' => 'nullable|string',
            'intro_icon_2' => 'nullable|string',
            'intro_icon_3' => 'nullable|string',
            'intro_img_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'intro_img_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us' => 'nullable|string',
            'why_us_services' => 'nullable|string',
            'why_us_img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us_img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'why_us_img_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'virtual_link' => 'nullable|string',
            'virtual_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $homepageContent = HomepageContent::findOrFail($id);
        $homepageContent->main_heading = $request->main_heading;
        $homepageContent->sub_heading = $request->sub_heading;
        $homepageContent->intro_decs = $request->intro_decs;
        $homepageContent->why_us = $request->why_us;
        $homepageContent->why_us_services = $request->why_us_services;
        $homepageContent->virtual_link = $request->virtual_link;
        
        $homepageContent->intro_icon_1 = $request->intro_icon_1;
        $homepageContent->intro_icon_2 = $request->intro_icon_2;
        $homepageContent->intro_icon_3 = $request->intro_icon_3;
    
        $homepageContent->intro_name_1 = $request->intro_name_1;
        $homepageContent->intro_name_2 = $request->intro_name_2;
        $homepageContent->intro_name_3 = $request->intro_name_3;
    
        if ($request->hasFile('banner')) {
            $homepageContent->banner = $request->file('banner')->store('images', 'public');
        }
        if ($request->hasFile('intro_img_back')) {
            $homepageContent->intro_img_back = $request->file('intro_img_back')->store('images', 'public');
        }
        if ($request->hasFile('intro_img_front')) {
            $homepageContent->intro_img_front = $request->file('intro_img_front')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_1')) {
            $homepageContent->why_us_img_1 = $request->file('why_us_img_1')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_2')) {
            $homepageContent->why_us_img_2 = $request->file('why_us_img_2')->store('images', 'public');
        }
        if ($request->hasFile('why_us_img_3')) {
            $homepageContent->why_us_img_3 = $request->file('why_us_img_3')->store('images', 'public');
        }
        if ($request->hasFile('virtual_img')) {
            $homepageContent->virtual_img = $request->file('virtual_img')->store('images', 'public');
        }
    
        $homepageContent->save();

        return redirect()->route('admin.homepage_content.list')->with('success', 'Content updated successfully');
    }

    public function destroy($id)
    {
        $coupon = HomepageContent::find($id);
        $coupon->delete();
        return redirect()->route('admin.homepage_content.list')->with('success', 'Content deleted successfully');
    }



}
