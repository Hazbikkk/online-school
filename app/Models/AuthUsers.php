<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthUsers extends Model
{
    protected $fillable = ['name', 'email', 'code'];
}
