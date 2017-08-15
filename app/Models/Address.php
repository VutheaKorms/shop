<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'address1',
        'address2',
        'country_id',
        'state_id',
        'location_id',
        'user_id',
        'status',
    ];

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact','address_id','id');
    }

    public function countries()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
}
