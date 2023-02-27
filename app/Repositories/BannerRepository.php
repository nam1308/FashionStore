<?php

namespace App\Repositories;

use App\Model\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class BannerRepository implements BannerRepositoryInterface
{
    private $model;

    public function __construct(){
        $this->model = resolve(Banner::class);
    }

    public function list(Request $request)
    {
        try {
            $length = $request->get('length', 7);
            $start = $request->get('start', 0);
            $total = $this->model::count();
            $banners = $this->model::orderBy('sort_order','asc')->offset($start)->limit($length)->get();
            return ['total'=> $total, 'data' => $banners ];
        } catch (\Exception $e){
            throw new BadRequestHttpException($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->model->query()->create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new BadRequestHttpException($e->getMessage());
        }
    }

    public function show($id)
    {
        return $this->model::find($id);
    }

    public function update($id, Request $request)
    {
        try{
            DB::beginTransaction();
                $this->model->query()->find($id)->update($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new BadRequestHttpException($e->getMessage());
        }
    }

    public function delete($id)
    {
        return $this->model::where('id',$id)->delete();
    }

    public function search(Request $request){
        try {
            $search = $request->post('search');
            $length = $request->post('length', 10);
            $start  = $request->post('start', 0);
            $total = $this->model::where("title", 'like', "%$search%")
                ->orderBy('sort_order', 'asc')->count();
            $banners = $this->model::where("title", 'like', "%$search%")
                ->orderBy('sort_order', 'asc')
                ->offset($start)->limit($length)->get();

            return ['data' => $banners, 'total' => $total];
        } catch (\Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }

}
