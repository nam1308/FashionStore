<?php

namespace App\Repositories;

use App\Model\Setting;
use Illuminate\Support\Arr;

class SettingRepository implements ISettingRepository
{

    public function save(array $data)
    {
        // TODO: Implement save() method.
        return Setting::query()->updateOrCreate(['key' => Arr::get($data, 'key'), 'lang' => Arr::get($data, 'lang')], $data);
    }

    public function getSetting(array $params = [])
    {
        // TODO: Implement getSetting() method.
        return Setting::query()->get();
    }
}
