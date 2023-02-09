<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        return view('admin.dashboard.index');
        $image = [
            0 => "/medias/1675648139.jpg",
            1 => "/medias/1675648145.png"
        ];
        return view('admin.dashboard.index',compact('image'));
    }

    public function test(Request $request){
        dd($request->image);
        return view('admin.dashboard.index');
    }

}
