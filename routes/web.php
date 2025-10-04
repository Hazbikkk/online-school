<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\ValidRole;

Route::get('/', function () {
    $objects = ['математика', 'русский'];
    $role = rand(1, 2); // 1 - ученик, 2 - админ
    return view('welcome', ['title' => 'Онлайн-школа: Базовые предметы',
                            'objects' => $objects,
                            'role' => $role]);
});
Route::get('/teachers', function () {

    $teachers = ['Марья Ивановна', 'Андрей Палыч', 'Томара Сергеевна'];

    return view('teachers', ['teachers' => $teachers]);
})->middleware(ValidRole::class);
Route::resource('/students', StudentsController::class);