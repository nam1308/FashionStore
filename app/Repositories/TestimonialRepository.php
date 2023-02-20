<?php

namespace App\Repositories;

use App\Model\Testimonial;
use Illuminate\Support\Arr;
use \App\Repositories\TestimonialRepositoryInterface;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    public $model;

    public function __construct()
    {
        $this->model = resolve(Testimonial::class);
    }

    public function list($start = 0, $length = 0)
    {
        // TODO: Implement list() method.
        return $this->model::orderBy('sort_order','asc')->offset($start)->limit($length)->get();
    }

    public function totalList()
    {
        // TODO: Implement totalList() method.
        return $this->model::count();
    }

    public function create($attributes = [])
    {
        // TODO: Implement create() method.
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
        return $this->model::where("title", 'like', "$search")
            ->orderBy('sort_order', 'asc')
            ->offset($start)->limit($length)->get();
    }

    public function totalSearch($search)
    {
        // TODO: Implement totalSearch() method.
        return $this->model::where("title", 'like', "$search")
            ->orderBy('sort_order', 'asc')->count();
    }
}
