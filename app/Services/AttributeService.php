<?php

namespace App\Services;

use App\Repositories\IAttributeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AttributeService
{
    protected $repository;

    public function __construct(IAttributeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(Request $request)
    {
        try {
            $start = $request->get('start', 0);
            $length = $request->get('length', 10);
            $search = $request->get('search', '');
            $parent = $request->get('parent', 0);
            return $this->repository->search($start, $length, $search, $parent);
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
    }


    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => Rule::unique('attributes', 'slug')->where('parent', $request->post('parent')),
                'parent' => 'nullable',
                'description' => 'nullable'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $this->repository->store($validator->validated());
            return response()->json(['status' => 'success', 'mess' => 'success'], 200);
        } catch (\Exception $ex) {
            throw new BadRequestException($ex->getMessage());
        }
    }

    public function update(int $attribute, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => Rule::unique('attributes', 'slug')->where('parent', $request->post('parent'))->ignore($attribute),
                'parent' => 'nullable',
                'description' => 'nullable'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $this->repository->update($attribute, $validator->validated());
            return response()->json(['status' => 'success', 'mess' => 'success'], 200);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 404);
        }
    }

    public function show(int $attribute)
    {
        try {
            return $this->repository->show($attribute);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 404);
        }
    }

    public function destroy(int $attribute)
    {
        // nên dùng soft delete
        try {
            $this->repository->destroy($attribute);
            return response()->json(['mess' => 'success'], 200);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 404);
        }
    }
}
