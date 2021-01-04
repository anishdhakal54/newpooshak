<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone','address', 'attachment1','attachment2', 'company_name', 'user_id'

    ];
}
