<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKey extends Model
{
    protected $fillable = [
        'key', 'value'
    ];
}
