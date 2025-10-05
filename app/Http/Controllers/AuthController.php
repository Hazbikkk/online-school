<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthAdminRequest;
use App\Models\AuthAdmin;

class AuthController extends Controller
{
    public function registration()
    {
        return view('auth.admin');
    }
    public function store(StoreAuthAdminRequest $request)
    {
        $validated = $request->validated();
        AuthAdmin::create($validated);

        return route('students.index');
    }
}
