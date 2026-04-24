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
use Illuminate\Support\Facades\DB;


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
        $code = $requestStud->query('code');
        $user = DB::table('register_stud')->where('code', $code)->first();
        $user_sess = $request->session()->get('storeUser');

        if ($user_sess['code'] == $validated['code']) {
            return redirect()->route('welcome.index');
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
            // Валидация данных
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ]);

    // Генерация кода
    $code = rand(1234, 9999);
    $validated['code'] = $code;

    // Вставка данных в таблицу
    // Вместо DB::table
    $user = AuthUsers::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'code' => $code,
    ]);

    // Проверка, что пользователь создан
    if (!$user) {
        return redirect()->back()->with('error', 'Не удалось создать пользователя');
    }

    // Сохранение данных в сессию
    $request->session()->put('storeUser', [
        'name' => $user->name,
        'code' => $user->code,
    ]);

    // Отправка письма через задачу
    dispatch(new SenEmailJob($user->code, $user->name, $user->email));

    // Перенаправление
    return redirect()->route('auth.user.confirm', [
        'name' => $user->name,
        'email' => $user->email,
    ])->with('success', 'Код отправлен на почту');
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
