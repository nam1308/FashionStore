<?php

namespace App\Repositories;

interface IAttributeRepository
{
    public function show(int $id);
    public function store(array $data);
    public function update(int $id, array $data);
    public function destroy(int $id);
    public function search(int $start, int $length, $search, $parent);
    public function filter($items);
}
