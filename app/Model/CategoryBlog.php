<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;

    protected $table = 'category_blog';
    protected $id = 'id';
    protected $fillable = [
        'id', 'name', 'slug', 'description', 'parent', 'thumbnail_url', 'banner_url', 'lang', 'sort_order', 'show_home', 'created_at', 'updated_at'
    ];


}
