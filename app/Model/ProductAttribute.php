<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'product_attributes';
    protected $id = 'id';
    protected $fillable = [
        'id', 'product_id', 'option', 'price', 'sku', 'stock', 'thumb_url'
    ];

    protected $casts = [
        'option' => 'object',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

}
