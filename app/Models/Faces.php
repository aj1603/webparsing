<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faces extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCode',
        'name',
        'price',
        'quantity',
        'status',
        'mainCategory',
        'secCategory',
        'language',
        'imgUrl',
        'description',
    ];
}
