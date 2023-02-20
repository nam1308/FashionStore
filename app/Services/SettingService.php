<?php

namespace App\Services;

use App\Repositories\ISettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SettingService
{
    protected $interface;

    public function __construct(ISettingRepository $interface)
    {
        $this->interface = $interface;
    }

    public function getSetting($params = [])
    {
        return $this->interface->getSetting($params);
    }

    public function findByKey($key)
    {
        try {
            return $this->interface->findByKey($key);
        } catch (\Exception $e) {
            throw new BadRequestException($e->getMessage());
        }
    }

    public function save(Request $request)
    {
        try {
            DB::beginTransaction();
            $settings = $request->all();
            foreach ($settings as $setting) {
                Validator::validate($setting, [
                    'value' => 'required',
                    'key' => 'required|unique:settings,key,' . data_get($setting, 'id'),
                    'lang' => 'required'
                ]);
                $this->interface->save($setting);
            }
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new BadRequestHttpException($exception->getMessage());
        }
    }
}
