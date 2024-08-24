<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\HomepageTestimonial;
use Illuminate\Http\Request;
use Validator;

class AdminHomepageTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = HomepageTestimonial::all();
        $data = [
            'title' => 'HomepageTestimonials',
            'testimonials' => $testimonials  
        ];

        return view('admin.pages.homepage_testimonial.index', compact('data'));
    }
    
    public function create()
    {
        $testimonial = HomepageTestimonial::all();
        $data = [
            'title' => 'HomepageTestimonials Create',
            'testimonial' => $testimonial  
        ];

        return view('admin.pages.homepage_testimonial.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            'postion' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        HomepageTestimonial::create($data);
        return redirect()->route('admin.homepage_testimonial.list')->with('success', 'testimonials added successfully');
    }

    public function edit($id)
    {
        $testimonial = HomepageTestimonial::find($id);
        $data = [
            'title' => 'HomepageTestimonials Edit',
            'testimonial' => $testimonial  
        ];

        return view('admin.pages.homepage_testimonial.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        

        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            'postion' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $homepageTestimonial = HomepageTestimonial::find($id);
        $homepageTestimonial->update($data);

        return redirect()->route('admin.homepage_testimonial.list')->with('success', 'testimonials updated successfully');
    }

    public function destroy($id)
    {
        $coupon = HomepageTestimonial::find($id);
        $coupon->delete();
        return redirect()->route('admin.homepage_testimonial.list')->with('success', 'testimonials deleted successfully');
    }



}
