<?php

namespace App\Routes;

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminPanelController;
use App\Models\AdminPanel;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidRole;
use App\Http\Middleware\AdminOrUser;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\EmployeeProfile;
use App\Http\Requests\EmployeeProfileRequest;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Middleware\IsTeacher;
use Illuminate\Support\Facades\DB;


// TODO: обьеденить роуты в группы
Route::get('/', function () {

    $descript = EmployeeProfile::pluck('about');
    $objects = ['math'=>'Математика', 'phys'=>'Физика', 'rus'=>'Русский', 'geo'=>'География'];
    return view('welcome', ['title' => 'Онлайн-школа: Базовые предметы',
                            'objects' => $objects,
                            'descript' => $descript]);
    
    
})->name('.');
Route::resource('/adminPanel', AdminPanelController::class)
->middleware(IsAdmin::class);
Route::get('/auth/admin', [AuthController::class, 'registrationForAdmin'])
->name('auth.admin');
Route::get('/auth/user', [AuthController::class, 'registrationForUser'])
->name('auth.user');
Route::post('/auth/admin/store', [AuthController::class, 'storeAdmin'])
->name('auth.admin.store')->middleware(AdminOrUser::class);
Route::post('/auth', [AuthController::class, 'storeUser'])->name('auth.user.store');
Route::get('/auth/user/confirm', [AuthController::class, 'confirm'])
->name('auth.user.confirm');
Route::get('/register/students', [AuthController::class, 'appruvStudents'])
->name('registration.students');
Route::post('/register', [AuthController::class, 'storeRegisterStudents'])
->name('register.students.store');

Route::get('/welcome', [WelcomeController::class, 'index'])
->name('welcome.index');
Route::get('/welcome/sign_up', [WelcomeController::class, 'create'])
->name('welcome.create');

Route::get('/objects/math', [ObjectsController::class, 'indexMath'])
->name('objects.math');
Route::get('/objects/russian', [ObjectsController::class, 'indexRussian'])
->name('objects.russian');
Route::get('/objects/physics', [ObjectsController::class, 'indexPhysics'])
->name('objects.physics');
Route::get('/objects/geography', [ObjectsController::class, 'indexGeography'])->
name('objects.geography');

Route::resource('/role', RoleController::class);

Route::resource('/employee', EmployeeController::class);
Route::get('/profile_employee', [EmployeeController::class, 'StoreEmployeeInDB'])
->name('profile_employee');
Route::get('/profile/logout', function() {
    $employee = DB::select();
})->name('profile.logout');
Route::get('/ref', [EmployeeController::class, 'refssilkaStore'])
->name('ref');
Route::post('/employee_profile', [EmployeeProfileController::class, 'storeProfile'])
->name('employee_profile.store');
Route::get('employee_profile/profile/', [EmployeeProfileController::class, 'showProfile'])
->name('employee_profile.profile');
Route::post('employee_profile/avatar', [EmployeeProfileController::class, 'avatarLoad'])
->name('avatar.uploade');
Route::resource('/group', GroupController::class)
->middleware(IsTeacher::class);