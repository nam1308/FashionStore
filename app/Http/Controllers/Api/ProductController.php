<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductsService;
use App\Model\Product;

class ProductController
{
    //
    protected ProductsService $service;

    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request)
    {
        return $this->service->list($request);
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update($id, Request $request)
    {
        return $this->service->update($id, $request);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function deleteAttribute($id)
    {
        return $this->service->deleteAttribute($id);
    }

    public function search(Request $request)
    {
        return $this->service->search($request);
    }

}
