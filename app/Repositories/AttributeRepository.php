<?php

namespace App\Repositories;

use App\Model\Attribute;
use Exception;

class AttributeRepository implements IAttributeRepository
{
    private $model;

    public function __construct()
    {
        $this->model = resolve(Attribute::class);
    }

    public function search(int $start = 0, int $length = 10, $search, $parent = 0)
    {
        $total = $this->model->where('parent', $parent)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
                $query->orWhere('slug', 'like', "%$search%");
            })
            ->offset($start)->limit($length)->count();

        $data = $this->model->where('parent', $parent)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
                $query->orWhere('slug', 'like', "%$search%");
            })
            ->offset($start)->limit($length)->get();

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    public function show(int $id)
    {
        $row = $this->model->find($id);
        if ($row) {
            return $row;
        }
        throw new Exception('Not found');
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $row = $this->model->find($id);
        if ($row) {
            return $row->update($data);
        }
        throw new Exception('Not found');
    }

    public function destroy(int $id)
    {
        $row = $this->model->find($id);
        if ($row) {
            $this->model->where('parent', $id)->delete();
            return $row->delete();
        }
        throw new Exception('Not found');
    }
}
