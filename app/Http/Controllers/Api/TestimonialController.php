<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TestimonialService;
use Illuminate\Http\Request;
use App\Model\Testimonial;

class TestimonialController extends Controller
{
    //
    protected TestimonialService $service;

    public function __construct(TestimonialService $service)
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

    public function search(Request $request)
    {
        return $this->service->search($request);
    }

}
