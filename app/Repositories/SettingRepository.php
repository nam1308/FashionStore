<?php

namespace App\Repositories;

use App\Model\Setting;
use Illuminate\Support\Arr;

class SettingRepository implements ISettingRepository
{
    public $model;

    public function __construct()
    {
        $this->model = resolve(Setting::class);
    }

    public function save(array $data)
    {
        // TODO: Implement save() method.
        return $this->model::query()->updateOrCreate(['id' => data_get($data, 'id')], $data);
    }

    public function findByKey(string $key)
    {
        // TODO: Implement save() method.
        return $this->model::query()->where(['key' => $key])->firstOrFail();
    }

    public function getSetting(array $params = [])
    {
        // TODO: Implement getSetting() method.
        return $this->model::query()->get();
    }
}
