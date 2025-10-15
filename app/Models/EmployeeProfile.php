<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = ['avatar', 'name', 'email', 'years', 'pass', 'repPass', 'about'];

}
