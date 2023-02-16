<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AttributeRepository;
use App\Repositories\IAttributeRepository;

class ProductController extends Controller
{
    private $repository;

    public function __construct(AttributeRepository $repository)
    {
        $this->repository = $repository;
    }

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

    public function variation($id)
    {
        try {
            $attribute = $this->repository->show($id);
            return view('admin.product.variation', ['data' => $attribute]);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }
}
