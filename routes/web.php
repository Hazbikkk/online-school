<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidRole;
use App\Http\Middleware\AdminOrUser;

Route::get('/', function () {
    $objects = ['математика', 'русский'];
    return view('welcome', ['title' => 'Онлайн-школа: Базовые предметы',
                            'objects' => $objects]);
});
Route::get('/teachers', function () {

    $teachers = ['Марья Ивановна', 'Андрей Палыч', 'Томара Сергеевна'];

    return view('teachers', ['teachers' => $teachers]);
})->middleware(ValidRole::class);
Route::resource('/students', StudentsController::class);
Route::get('/auth/admin', [AuthController::class, 'registration'])->name('auth.admin');
Route::post('/auth', [AuthController::class, 'store'])->name('auth.store')->middleware(AdminOrUser::class);