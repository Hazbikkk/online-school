<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $user_sess = $request->session()->get('storeUser');

        return view('welcome.student', ['name' => $user_sess['name']]);
    }

    public function create()
    {
        $names = EmployeeProfile::pluck('name');
        $objects = EmployeeProfile::pluck('object')->unique();
        return view('welcome.create', ['names' => $names, 'objects' => $objects]);
    }
}
