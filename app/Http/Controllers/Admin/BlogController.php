<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;
use App\Model\CategoryBlog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::all();
        return view('admin.blog.blog',compact('blogs'));
    }

    public function create(){
        $image = [];
        $category_blog = CategoryBlog::all();
        return view('admin.blog.create',compact('image','category_blog'));
    }

    public function list(Request $request)
    {
        $length = $request->get('length', 10);
        $start  = $request->get('start', 0);
        $total = Blog::count();
        $blogs = Blog::orderBy('sort_order', 'asc')->offset($start)->limit($length)->get();
        return ['data' => $blogs, 'total' => $total];
    }

    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:blog',
            'excerpt' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        Blog::create($request->all());
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function show($id)
    {
        return Blog::find($id) ?? response(['message' => 'not found'], 404);
    }

    public function edit($id){
        $blogs = Blog::where('id',$id)->first();
        $category_blog = CategoryBlog::all();
        return view('admin.blog.edit',compact('blogs','category_blog'));
    }

    public function update(Blog $blog, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:blog,slug,'.$blog->id,
            'excerpt' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $blog->update($request->all());
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function search(Request $request)
    {
        $search = $request->post('search');
        $length = $request->post('length', 10);
        $start  = $request->post('start', 0);
        $total = Blog::where("name", 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")
            ->orderBy('sort_order', 'asc')->count();

        $blogs = Blog::where("name", 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")->orderBy('sort_order', 'asc')
            ->offset($start)->limit($length)->get();

        return [
            'data' => $blogs,
            'total' => $total
        ];
    }
}
