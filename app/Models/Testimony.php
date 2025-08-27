<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonies';

    protected $fillable = [
        'image',
        'testimony',
        'name',
        'job',
        'created_at',
        'updated_at',
    ];
}
