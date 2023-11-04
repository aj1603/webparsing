<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'pullbearproducts';

    protected $primaryKey = 'id';
    protected $fillable = [
        'productcode',
        'name',
        'orginalprice',
        'price',
        'quantity',
        'status',
        'maincat',
        'seccat',
        'language',
        'description',
        'imgUrl',
        'size',
        'brand',
    ];

    public function productSize()
    {
        return $this->hasMany(ProductSize::class);
    }
}
