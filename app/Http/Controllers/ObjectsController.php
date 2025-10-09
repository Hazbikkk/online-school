<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    public function indexMath()
    {
        return view('welcome.objects.math');
    }
    public function indexRussian()
    {
        return view('welcome.objects.russian');
    }
    public function indexPhysics()
    {
        return view('welcome.objects.physics');
    }
    public function indexGeography()
    {
        return view('welcome.objects.geography');
    }
}
