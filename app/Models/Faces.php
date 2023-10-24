<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faces extends Model
{
    use HasFactory;

    protected $fillable = [
        'productcode',
        'name',
        'price',
        'quantity',
        'status',
        'maincat',
        'seccat',
        'language',
        'imgUrl',
        'description',
    ];
}
