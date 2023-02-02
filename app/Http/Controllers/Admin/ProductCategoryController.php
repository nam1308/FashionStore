<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function list()
    {
        return ProductCategory::orderBy('sort_order', 'asc')->get();
    }

    public  function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:product_categories',
            'description' => 'required',
            'parent' => 'required|numeric',
            'sort_order' => 'required|numeric',
            'show_home' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        ProductCategory::create($validator->validated());
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function show($id)
    {
        return ProductCategory::find($id) ?? response(['message' => 'not found'], 404);
    }

    public function update(ProductCategory $category, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug,' . $category->id,
            'description' => 'required',
            'parent' => 'required|numeric',
            'sort_order' => 'required|numeric',
            'show_home' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $category->update($validator->validated());
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    // public function getParent(ProductCategory $category)
    // {
    //     return $category ? $category->getParent($category->id) : response(['message' => 'not found'], 404);
    // }
}
