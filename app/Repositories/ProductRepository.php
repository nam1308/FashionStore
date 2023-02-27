<?php

namespace App\Repositories;

use App\Model\Product;
use Illuminate\Support\Arr;
use \App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public $model;

    public function __construct()
    {
        $this->model = resolve(Product::class);
    }

    public function list($start = 0, $length = 0)
    {
        // TODO: Implement list() method.
        return $this->model::orderBy('sort_order', 'asc')->offset($start)->limit($length)->get();
    }

    public function totalList()
    {
        return $this->model::count();
    }

    public function create($attributes = [])
    {
        // TODO: Implement store() method.
        return $this->model::create($attributes);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return $this->model::find($id);
    }

    public function update($id, $attributes = [])
    {
        // TODO: Implement update() method.
        return $this->model::query()->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->model::where('id',$id)->delete();
    }

    public function search($start = 0, $length = 0, $search = '')
    {
        // TODO: Implement search() method.
        return $this->model::where("name", 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")->orderBy('sort_order', 'asc')
            ->offset($start)->limit($length)->get();
    }

    public function totalSearch($search = '')
    {
        return $this->model::where("name", 'like', "%$search%")
            ->orWhere('slug', 'like', "%$search%")
            ->orderBy('sort_order', 'asc')->count();
    }

}
