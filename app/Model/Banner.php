<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';
    protected $id = 'id';
    protected $fillable = [
        'id', 'title', 'sub_title', 'href', 'image', 'sort_order', 'status', 'lang'
    ];

}
