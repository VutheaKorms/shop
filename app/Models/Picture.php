<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'name',
        'size',
        'type',
        'pic',
        'path',
        'status',
        'user_id'
    ];
}
