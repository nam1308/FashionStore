<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $id = 'id';
    protected $fillable = [
        'name', 'slug', 'excerpt', 'image', 'content', 'sort_order', 'status', 'parent', 'is_popular', 'author', 'lang'
    ];
}
