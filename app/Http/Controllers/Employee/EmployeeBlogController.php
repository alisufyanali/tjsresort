<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Validator;

class EmployeeBlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::with('category', 'tags', 'comments')->get();

        $data = [
            'title' => 'Blogs',
            'blogs' => $blogs  
        ];
        return view('employee.pages.blogs.index', compact('data'));
    }
 
    public function show(Blog $blog)
    {
        return view('employee.pages.blogs.show', compact('blog'));
    }


}
