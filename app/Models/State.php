<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'country_id',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
}
