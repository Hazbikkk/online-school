<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidRole;
use App\Http\Middleware\AdminOrUser;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    $objects = ['math'=>'Математика', 'phys'=>'Физика', 'rus'=>'Русский', 'geo'=>'География'];
    $descript = ['матика', 'физ','рус','гео'];
    return view('welcome', ['title' => 'Онлайн-школа: Базовые предметы',
                            'objects' => $objects,
                            'descript' => $descript]);
    
})->name('.');
Route::get('/teachers', function () {

    $teachers = ['Марья Ивановна', 'Андрей Палыч', 'Томара Сергеевна'];

    return view('teachers', ['teachers' => $teachers]);
})->middleware(ValidRole::class);
Route::resource('/adminPanel', AdminPanelController::class)->middleware(IsAdmin::class);
Route::get('/auth/admin', [AuthController::class, 'registrationForAdmin'])->name('auth.admin');
Route::get('/auth/user', [AuthController::class, 'registrationForUser'])->name('auth.user');
Route::post('/auth/admin/store', [AuthController::class, 'storeAdmin'])->name('auth.admin.store')->middleware(AdminOrUser::class);
Route::post('/auth', [AuthController::class, 'storeUser'])->name('auth.user.store');
Route::get('/auth/user/confirm', [AuthController::class, 'confirm'])->name('auth.user.confirm');
Route::get('/register/students', [AuthController::class, 'appruvStudents'])->name('registration.students');
Route::post('/register', [AuthController::class, 'storeRegisterStudents'])->name('register.students.store');

Route::get('/objects/math', [ObjectsController::class, 'indexMath'])->name('objects.math');
Route::get('/objects/russian', [ObjectsController::class, 'indexRussian'])->name('objects.russian');
Route::get('/objects/physics', [ObjectsController::class, 'indexPhysics'])->name('objects.physics');
Route::get('/objects/geography', [ObjectsController::class, 'indexGeography'])->name('objects.geography');

Route::resource('/role', RoleController::class);

Route::resource('/employee', EmployeeController::class);
Route::get('/profile_employee', function (StoreEmployeeRequest $request) {
    $role_name = $request->session()->get('role_name', 'editor');
    $roles = Roles::all(); // Или статический список ролей
    return view('profile_employee.create', [
        'role_name' => $role_name,
        'roles' => $roles
    ]);
})->name('profile_employee');
Route::get('/ref', function (Request $request) {
    // Получаем role_id из query-параметра
    $role_id = $request->query('role_id');
    
    // Сохраняем роль в сессии, только если role_id передан
    if ($role_id) {
        $request->session()->put('role_name', $role_id);
    }
    
    // Создаем временную подписанную ссылку
    $refssilka = URL::temporarySignedRoute('profile_employee', now()->addMinutes(30));
    
    return view('ref.index', ['refssilka' => $refssilka]);
})->name('ref');