<?php

namespace App\Services;

use App\Repositories\IUserRepository;

class UserService extends BaseService
{
    protected $user;

    public function __construct(IUserRepository $IUser)
    {
        $this->user = $IUser;
    }

    public function getList()
    {
        return $this->user->getAllUser();
    }
}
