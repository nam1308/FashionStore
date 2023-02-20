<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = "testimonial";
    protected $id = 'id';
    protected $fillable = [
        'id', 'title', 'sub_title', 'content', 'avatar', 'lang', 'sort_order'
    ];
}
