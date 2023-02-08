<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function getUser()
    {
        // TODO: Implement getUser() method.
    }

    public function getUserById($id)
    {
        // TODO: Implement getUserById() method.
    }

    public function getAllUser($sort = 'DESC', $perPage = 20)
    {
        // TODO: Implement getAllUser() method.

        return User::query()->orderBy('created_at', $sort)->paginate($perPage);
    }

    public function createUser($user)
    {
        // TODO: Implement createUser() method.
    }

    public function updateUser($id, $data)
    {
        // TODO: Implement updateUser() method.
    }

    public function deleteBuyId($id)
    {
        // TODO: Implement deleteBuyId() method.
    }

}
