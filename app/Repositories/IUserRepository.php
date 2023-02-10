<?php

namespace App\Repositories;

interface IUserRepository
{
    public function getUser();

    public function getUserById($id);

    public function getAllUser($sort = 'DESC');

    public function createUser($user);

    public function updateUser($id, $data);

    public function deleteBuyId($id);
}
