<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function menu()
    {
        return view('admin.setting.menu');
    }

    // public function save(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'key' => 'required', 'value' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return response($validator->errors(), 400);
    //     }

    //     $data = $validator->validated();
    //     $setting = Setting::where('key', $data['key'])->first();
    //     if ($setting) {
    //         $setting->update(array_merge($data, ['value' => json_encode($data['value'])]));
    //     } else {
    //         Setting::create(array_merge($data, ['value' => json_encode($data['value'])]));
    //     }

    //     return response(['status' => 'success', 'mess' => 'success'], 200);
    // }

    // public function show(Request $request)
    // {
    //     $key = $request->get('key');
    //     $setting = Setting::where('key', $key)->first();
    //     return $setting ?? response(['status' => 'error', 'message' => 'not found'], 404);
    // }
}
