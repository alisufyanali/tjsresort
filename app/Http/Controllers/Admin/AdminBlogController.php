<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Validator;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'tags', 'comments')->get();

        $data = [
            'title' => 'Blogs',
            'blogs' => $blogs  
        ];
        return view('admin.pages.blogs.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'title' => 'Blogs',
            'categories' => $categories  ,
            'tags' => $tags  ,
        ];

        return view('admin.pages.blogs.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required',
            'content'        => 'required',
            'category_id'    => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'tags'           => 'nullable|array',
        ]);

        $data = $request->all();
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('featured_images', 'public');
        }

        $blog = Blog::create($data);
        $blog->tags()->sync($request->tags);

        return redirect()->route('admin.blogs.list')->with('success', 'Blog Updated successfully.');;
    }

    public function show(Blog $blog)
    {
        return view('admin.pages.blogs.show', compact('blog'));
    }

    public function edit($id )
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blog = Blog::find($id);

        $data = [
            'title' => 'Blogs',
            'categories' => $categories  ,
            'tags' => $tags  ,
            'blog' => $blog  ,
        ];

        return view('admin.pages.blogs.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'          => 'required',
            'content'        => 'required',
            'category_id'    => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'tags'           => 'nullable|array',
        ]);

        $data = $request->all();
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('featured_images', 'public');
        }
        $blog = Blog::find($id);
        $blog->update($data);
        
        if (isset($request->tags)  && count($request->tags) > 0 ) {
            BlogTag::where('blog_id' , $id )->delete();
            foreach ($request->tags as $key => $tag) {
                 $tagData = new BlogTag ;
                 $tagData->tag_id   = $tag;
                 $tagData->blog_id  = $id;
                 $tagData->save();
            }
        }
        // $blog->tags()->sync($request->tags ?? []); // Ensure tags is an array or empty
        return redirect()->route('admin.blogs.list')->with('success', 'Blog Updated successfully.');;
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.list')->with('success', 'Blog Updated successfully.');;
    }

}
