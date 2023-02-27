<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'parent', 'description'];

    public function children()
    {
        return $this->hasMany(Attribute::class, 'parent');
    }
}
