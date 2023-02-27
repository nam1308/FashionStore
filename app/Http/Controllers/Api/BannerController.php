<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BannerService;
class BannerController extends Controller
{
    //
    protected BannerService $banner;
    public function __construct(BannerService $banner)
    {
        $this->banner = $banner;
    }

    public function list(Request $request)
    {
        return $this->banner->list($request);
    }

    public function create(Request $request)
    {
        return $this->banner->store($request);
    }

    public function show($id)
    {
        return $this->banner->show($id);
    }

    public function update($id, Request $request)
    {
        return $this->banner->update($id, $request);
    }

    public function delete($id)
    {
        return $this->banner->delete($id);
    }

    public function search(Request $request)
    {
        return $this->banner->search($request);
    }
}
