<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface BannerRepositoryInterface
{
    public function list(Request $request);

    public function store(Request $request);

    public function show($id);

    public function update($id, Request $request);

    public function delete($id);

    public function search(Request $request);
}
