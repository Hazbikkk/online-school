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
Route::get('/auth/admin', [AuthController::class, 'registrationForAdmin'])->name('auth.admin');
Route::get('/auth/user', [AuthController::class, 'registrationForUser'])->name('auth.user');
Route::post('/auth/admin/store', [AuthController::class, 'storeAdmin'])->name('auth.admin.store')->middleware(AdminOrUser::class);
Route::post('/auth', [AuthController::class, 'storeUser'])->name('auth.user.store');
Route::get('/auth/user/confirm', [AuthController::class, 'confirm'])->name('auth.user.confirm');
Route::get('/register/students', [AuthController::class, 'appruvStudents'])->name('registration.students');
Route::post('/register', [AuthController::class, 'storeRegisterStudents'])->name('register.students.store');