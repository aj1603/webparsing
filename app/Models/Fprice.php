<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fprice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fprice',
    ];
}
