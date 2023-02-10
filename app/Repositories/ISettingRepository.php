<?php

namespace App\Repositories;

interface ISettingRepository
{
    public function save(array $data);

    public function getSetting(array $params);
}
