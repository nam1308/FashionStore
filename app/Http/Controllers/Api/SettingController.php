<?php

namespace App\Http\Controllers\Api;

use App\Model\Setting;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController
{
    protected SettingService $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->getSetting($request->all());
    }

    public function save(Request $request)
    {
        return $this->service->save($request);
    }
}
