<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function state()
    {
        return $this->hasMany('App\Models\State','country_id','id');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address','country_id','id');
    }
}
