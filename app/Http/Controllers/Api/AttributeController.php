<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AttributeService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $service;

    public function __construct(AttributeService $service)
    {
        $this->service = $service;
    }

    public function search(Request $request)
    {
        return $this->service->search($request);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(int $attribute, Request $request)
    {
        return $this->service->update($attribute, $request);
    }

    public function show(int $attribute)
    {
        return $this->service->show($attribute);
    }

    public function destroy(int $attribute)
    {
        return $this->service->destroy($attribute);
    }

    public function filter(Request $request)
    {
        return $this->service->filter($request);
    }
}
