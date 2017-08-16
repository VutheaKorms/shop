<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name',
        'number1',
        'number2',
        'postal_code',
        'fax_number',
        'address_id',
        'description',
        'email_address',
        'user_id',
        'status',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product','contact_id','id');
    }

    public function addresses()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
}
