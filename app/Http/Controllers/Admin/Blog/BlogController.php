<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Core\Blog\BlogInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blog;

    public function __construct(BlogInterface $blogInterface)
    {
        $this->blog = $blogInterface;
    }
    public function index()
    {
        $data['blogs'] = $this->blog->getAllBlogs();
        return view('Admin.Blog.index', $data);
    }

   
    public function create()
    {
        return view('Admin.Blog.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:20',
        ]);
        $data = $request->only('image', 'title', 'description');
        if ($this->blog->storeBlog($data)) {
            return redirect()->route('blogs.index')->with('msg', 'New Blog Added Successfully');
        } else {
            return back()->with('msg', 'Some error occur!, Try again');
        }

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($slug)
    {
        $data['blog'] = $this->blog->getBlog($slug);
        return view('Admin.Blog.edit', $data);
    }

    
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:20',
        ]);
        $data = $request->only('image', 'title', 'description');
        if ($this->blog->updateBlog($data, $slug)) {
            return redirect()->route('blogs.index')->with('msg', 'New Blog Added Successfully');
        } else {
            return back()->with('msg', 'Some error occur!, Try again');
        }
    }

    
    public function destroy($id)
    {
        //
    }
}