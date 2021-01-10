<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Getquote extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'category', 'company_name', 'user_id','subcategory',

    ];

}
