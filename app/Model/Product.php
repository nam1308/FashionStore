<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $id = 'id';
    protected $fillable = [
        'id', 'name', 'slug', 'description', 'content', 'parent', 'sort_order', 'status', 'regular_price', 'thumbs', 'image', 'is_hot', 'meta_description', 'meta_title', 'meta_keyword', 'lang'
    ];
    protected $casts = [
        'thumbs' => 'array',
    ];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
}
