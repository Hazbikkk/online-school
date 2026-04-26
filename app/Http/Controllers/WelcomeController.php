<?php

namespace App\Http\Controllers;

use App\Models\AuthUsers;
use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use App\Models\Cours;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if(session()->has('storeUser'))
        {
            $user_sess = $request->session()->get('storeUser');
        }
        $users = AuthUsers::all();

        return view('welcome.student', ['name' => !empty($user_sess['name']) ? $user_sess['name'] : header("Location: /")]);
    }

    public function create()
    {
        $names = EmployeeProfile::pluck('name');
        $objects = EmployeeProfile::pluck('object')->unique();
        return view('welcome.create', ['names' => $names, 'objects' => $objects]);
    }
    public function store(Request $request)
    {
        $schema = [
            'subject' => $request->subject,
            'teacher' => $request->teacher,
        ];

        Cours::create($schema);

        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        $_SESSION['warning'] = "Вы успешно подали заявку на обучение в курсе - \"$request->subject\", учителя: $request->teacher";

        return redirect()->route('welcome.index');

    }
}
