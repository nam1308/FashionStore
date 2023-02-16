<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\CategoryBlog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    // Return list page
    public function index()
    {
        return view('admin.category_blog.index');
    }

    // Return blog create page
    public function create()
    {
        $categoryBlogs = CategoryBlog::all();
        return view('admin.category_blog.create', compact('categoryBlogs'));
    }

    // Return blog edit page
    public function edit($id)
    {
        $category_blog = CategoryBlog::all();
        $categoryBlogs = CategoryBlog::where('id', $id)->first();
        return view('admin.category_blog.edit', compact('categoryBlogs','category_blog'));
    }

    // Function to display list of blog categories
    public function list(Request $request)
    {
        $length = $request->get('length',10);
        $start = $request->get('start', 0);
        $total = CategoryBlog::count();
        $categoryBlogs = CategoryBlog::orderBy('sort_order')->offset($start)->limit($length)->get();
        return ['data' => $categoryBlogs, 'total' => $total];
    }

    // Function to send request to server
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:category_blog',
//            'thumbnail_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'banner_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if($validator->fails()){
            return response($validator->errors(), 422);
        }

        CategoryBlog::create($request->all());
        return response(['status' => 'Success', 'message' => 'Success'], 201);
    }

    // Data display function
    public function show($id)
    {
        return CategoryBlog::find($id) ?? response(['message' => 'not found'], 404);
    }

    // Data update function
    public function update(CategoryBlog $categoryBlog, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:category_blog,slug,'.$categoryBlog->id,
//            'thumbnail_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'banner_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $categoryBlog->update($request->all());

        return response(['status' => 'Success', 'message' => 'Success'], 201);
    }

    // Data delete function
    public function delete(CategoryBlog $categoryBlog)
    {
        $categoryBlog->delete();
        return response(['status' => 'Success', 'message' => 'Success'], 201);
    }

    // Data search function
    public function search(Request $request)
    {
        $search = $request->post('search');
        $length = $request->post('length',10);
        $start = $request->post('start',0);
        $total = CategoryBlog::where("name","like","%$search%")
            ->orWhere('slug','like',"%$search%")
            ->orderBy('sort_order','asc')->count();
        $categoryBlog = CategoryBlog::where("name",'like',"%$search%")
            ->orWhere('slug','like',"%$search%")
            ->orderBy('sort_order','asc')
            ->offset($start)->limit($length)->get();
        return[
            'data' => $categoryBlog,
            'total' => $total
        ];
    }


}
