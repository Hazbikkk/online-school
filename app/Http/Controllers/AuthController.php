<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthAdminRequest;
use App\Http\Requests\StoreAuthUserRequest;
use App\Models\AuthAdmin;
use App\Models\AuthUsers;
use App\Routes\web;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SenEmailJob;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterStoreStudRequest;
use App\Models\RegisterStud;


class AuthController extends Controller
{
    public function registrationForAdmin()
    {
        return view('auth.admin');
    }
    public function registrationForUser()
    {
        return view('auth.user');
    }
    public function appruvStudents()
    {
        return view('auth.students');
    }
    public function storeRegisterStudents(Request $request, RegisterStoreStudRequest $requestStud)
    {
        $validated = $requestStud->validated();   
        $user = AuthUsers::where('code', $request->input('code'))->first();
        $user_sess = $request->session()->get('storeUser');

        if ($user_sess['code'] == $validated['code']) {
            return view('welcome.student', ['name' => $user->name]);
        }

        return response()->json(['error' => 'Неправильное имя или код'], 422);
    }
    public function storeAdmin(StoreAuthAdminRequest $request)
    {
        $validated = $request->validated();
        AuthAdmin::create($validated);

        return route('adminPanel.index');
    }
    public function storeUser(StoreAuthUserRequest $request)
    {
        $validated = $request->validated();
        $code = rand(1234, 9999); // Исправленный диапазон для четырехзначного кода
        $validated['code'] = $code;
        $user = AuthUsers::create($validated);
        $request->session()->put('storeUser', ['name' => $user->name, 'code' => $user->code]);

        // Отправляем письмо с именем и кодом
        SenEmailJob::dispatch($user->email, $user->name, $user->code);

        return redirect()->route('auth.user.confirm', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    public function confirm(Request $request)
    {
        // Удаляем генерацию кода, так как она теперь в storeUser
        return view('auth.userConfirmed', [
            'name' => $request->query('name'),
            'email' => $request->query('email'),
        ]);
    }
    //public function storeRegisterStudents()
    //{

    //}
    }
