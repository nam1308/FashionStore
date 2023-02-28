<?php

namespace App\Repositories;

use App\Model\Product;
use App\Model\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProductRepository implements ProductRepositoryInterface
{
    public Product $model;
    public ProductAttribute $attribute;

    public function __construct()
    {
        $this->model = resolve(Product::class);
        $this->attribute = resolve(ProductAttribute::class);
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

    public function create(Request $request)
    {
        // TODO: Implement store() method.
        try {
            $data = $request->all();
            $attributes = $request->post('attribute');
            $product = $this->model->query()->create($data);
            if (!empty($attributes)) {
                foreach ($attributes as $attribute) {
                    $attribute = Arr::add($attribute, 'product_id', $product->id);
                    $this->attribute->query()->updateOrCreate(
                        ['product_id' => $product->id, 'option' => json_encode(Arr::get($attribute, 'option'))],
                        $attribute
                    );
                }
            }
            return $product->id;
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return [
            $this->model::find($id),
            $this->attribute->whereRaw('FIND_IN_SET(?, product_id)', [$id])->get()
        ];
    }

    public function update($id, Request $request)
    {
        // TODO: Implement update() method.
        try {
            DB::beginTransaction();
            $data = $request->all();
            $attributes = $request->post('attribute');
            $this->model->query()->find($id)->update($data);
            if (!empty($attributes)) {
                foreach ($attributes as $attribute) {
                    $attribute = Arr::add($attribute, 'product_id', $id);
                    $this->attribute->query()->updateOrCreate(
                        ['product_id' => $id, 'option' => json_encode(Arr::get($attribute, 'option'))],
                        $attribute
                    );
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new BadRequestHttpException($e->getMessage());
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        try {
            DB::beginTransaction();
            $this->attribute->query()->where('product_id', $id)->delete();
            $this->model->query()->find($id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new BadRequestHttpException($e->getMessage());
        }return $this->model::where('id',$id)->delete();
    }

    public function deleteAttribute($id)
    {
        return $this->attribute::where('id', $id)->delete();
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
