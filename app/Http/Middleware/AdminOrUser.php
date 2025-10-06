<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreAuthAdminRequest;

class AdminOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Создаём экземпляр StoreAuthAdminRequest
        $login = 'Hadis';
        $password = "1002910029";
        $request_login = $request->input('login');
        $request_password = $request->input('password');
        if($login == $request_login && $password == $request_password){
            return redirect()->route('students.index');
        }
            return response()->json(['error' => 'неправильные логин или пароль']);
    }
}
