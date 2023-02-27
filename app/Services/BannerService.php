<?php

namespace App\Services;

use App\Repositories\BannerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerService
{
    protected $interface;

    public function __construct(BannerRepositoryInterface $interface)
    {
        $this->interface = $interface;
    }

    public function list(Request $request)
    {
        return $this->interface->list($request);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'sub_title' => 'required',
                'href' => 'required|url',
//                'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            ]);

            if($validator->fails()){
                return response($validator->errors(), 400);
            }

            return $this->interface->store($request);

        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function show($id)
    {
        try {
            return $this->interface->show($id);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'sub_title' => 'required',
                'href' => 'required|url',
//                'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            ]);

            if($validator->fails()){
                return response($validator->errors(), 400);
            }

            return $this->interface->update($id,$request);

        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            return $this->interface->delete($id);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function search(Request $request){
        try {
            return $this->interface->search($request);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}
