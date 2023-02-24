<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class ProductsService
{
    protected $interface;

    public function __construct(ProductRepositoryInterface $interface)
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
        $products = $this->interface->list($start,$length);
        return ['data' => $products, 'total' => $total];
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required|unique:products',
                'regular_price' => 'required',
//            'thumbs' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'attribute.*.thumb_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
                'attribute.*.price' => 'required',
                'attribute.*.sku' => 'required',
                'attribute.*.stock' => 'required',
            ], [
                'attribute.*.thumb_url' => 'The image',
                'attribute.*.sku' =>  'The sku',
                'attribute.*.price' =>  'The price',
                'attribute.*.stock' =>  'The stock',
            ]);

            if($validator->fails()){
                return response($validator->errors(), 400);
            }

            return $this->interface->create($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        return $this->interface->show($id) ?? response(['message' => 'not found'], 404);
    }


    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:products,slug,'.$id,
            'regular_price' => 'required',
//            'thumbs' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
//            'attribute.*.thumb_url' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            'attribute.*.price' => 'required',
            'attribute.*.sku' => 'required',
            'attribute.*.stock' => 'required',
        ], [
            'attribute.*.thumb_url' => 'The image',
            'attribute.*.sku' =>  'The sku',
            'attribute.*.price' =>  'The price',
            'attribute.*.stock' =>  'The stock',
        ]);

        if ($validator->fails())
        {
            return response($validator->errors(), 422);
        }
        $this->interface->update($id,$request);
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function delete($id)
    {
        $this->interface->delete($id);
        return response(['status' => 'success', 'message' => 'Success'], 201);
    }

    public function deleteAttribute($id)
    {
        try {
            return $this->interface->deleteAttribute($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function search(Request $request)
    {
        $search = $request->post('search');
        $length = $request->post('length', 10);
        $start  = $request->post('start', 0);
        $total = $this->interface->totalSearch($search);
        $products = $this->interface->search($start, $length, $search);

        return [
            'data' => $products,
            'total' => $total
        ];
    }

}
