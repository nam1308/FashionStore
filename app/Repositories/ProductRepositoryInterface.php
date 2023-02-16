<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{

    public function list($start = 0, $length = 0);

    public function totalList();

    public function create($attributes = []);

    public function show($id);

    public function update($id, $attributes = []);

    public function delete($id);

    public function search($start = 0, $length = 0, $search = '');
    public function totalSearch($search);

}
