<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
