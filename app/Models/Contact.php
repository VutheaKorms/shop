<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    public function addresses()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
}
