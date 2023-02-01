<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'parent', 'sort_order', 'show_home'
    ];

    public function getParent($id)
    {
        return $this::query()->join('product_categories as b', 'product_categories.parent', '=', 'b.id')
            ->where("product_categories.id", $id)->get();
    }
}
