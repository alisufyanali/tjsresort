<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Validator;

class MemberBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'tags', 'comments')->get();

        $data = [
            'title' => 'Blogs',
            'blogs' => $blogs  
        ];
        return view('member.pages.blogs.index', compact('data'));
    }
 
    public function show(Blog $blog)
    {
        return view('member.pages.blogs.show', compact('blog'));
    }

}
