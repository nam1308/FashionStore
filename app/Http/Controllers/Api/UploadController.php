<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class UploadController extends Controller
{
    public function getImagePath(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5120'
        ]);
        $image = $request->file('file');
        $new_name = $image->getClientOriginalName();
        $image->move(public_path('medias'), $new_name);
        return [
            'path' => "/medias/$new_name",
            'uid' => time()
        ];
    }

    public function deleteImage(Request $request)
    {
        $image = $request->post('path');
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
        }
        return ['success' => true];
    }

}
