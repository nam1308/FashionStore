<?php

namespace App\Repositories;

interface TestimonialRepositoryInterface
{
    public function list($start = 0, $length = 0);

    public function totalList();

    public function create($atributes = []);

    public function show($id);

    public function update($id, $atributes = []);

    public function delete($id);

    public function search($start = 0, $length = 0, $search = '');

    public function totalSearch($search);

}
