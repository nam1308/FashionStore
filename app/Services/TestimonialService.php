<?php

namespace App\Services;

use App\Repositories\TestimonialRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Model\Testimonial;

class TestimonialService
{
    protected $interface;

    public function __construct(TestimonialRepositoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function list(Request $request)
    {
        $length = $request->get('length', 10);
        $start  = $request->get('start', 0);
//        $this->interface->totalList();
//        $this->interface->list($start,$length);

        $total = $this->interface->totalList();
        $testimonials = $this->interface->list($start,$length);
        return ['data' => $testimonials, 'total' => $total];
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
//            'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $this->interface->create($request->all());;

        return response(['status' => 'success', 'message' => 'success'], 201);

    }

    public function show($id)
    {
        return $this->interface->show($id) ?? response(['message' => 'not found'], 404);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
//            'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if ($validator->fails())
        {
            return response($validator->errors(), 422);
        }

        $this->interface->update($id,$request->all());
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function delete($id)
    {
        $this->interface->delete($id);
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function search(Request $request)
    {
        $search = $request->post('search');
        $length = $request->post('length', 10);
        $start  = $request->post('start', 0);
        $total = $this->interface->totalSearch($search);
        $testimonials = $this->interface->search($start, $length, $search);

        return [
            'data' => $testimonials,
            'total' => $total
        ];
    }

}

