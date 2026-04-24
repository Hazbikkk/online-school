<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = ['avatar', 'name', 'object', 'email', 'years', 'pass', 'repPass', 'about'];

}
