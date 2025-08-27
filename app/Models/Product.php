<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'image',
        'description',
        'price',
        'created_at',
        'updated_at',
    ];
}
