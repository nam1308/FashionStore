<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function category()
    {
        return view('admin.product.category');
    }

    public function attribute()
    {
        return view('admin.product.attribute');
    }
}
