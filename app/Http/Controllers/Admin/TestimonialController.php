<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Model\Testimonial;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        return view('admin.testimonial.index');
    }

}
