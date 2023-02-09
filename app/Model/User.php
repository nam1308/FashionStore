<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $id = 'id';
    protected $fillable = [
        'id', 'name', '	email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'username', 'avatar'
    ];
}
