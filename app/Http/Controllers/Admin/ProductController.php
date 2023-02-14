<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Model\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.product.create',compact('productCategories'));
    }

    public function edit($id)
    {
        $productCategories = ProductCategory::all();
        $products = Product::where('id', $id)->first();
        return view('admin.product.edit',compact('productCategories', 'products'));
    }

    public function duplicate($id)
    {
        $productCategories = ProductCategory::all();
        $products = Product::where('id', $id)->first();
        return view('admin.product.duplicate',compact('productCategories', 'products'));
    }

    public function category()
    {
        return view('admin.product.category');
    }

}
