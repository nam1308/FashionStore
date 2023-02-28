<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function list($start = 0, $length = 0);

    public function totalList();

    public function create(Request $product);

    public function show($id);

    public function update($id, Request $request);

    public function delete($id);

    public function search($start = 0, $length = 0, $search = '');

    public function totalSearch($search);

}
