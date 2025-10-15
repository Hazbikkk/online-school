<?php

namespace App\Routes;

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
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\GroupController;

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
Route::post('/employee_profile', function(EmployeeProfileRequest $request) {
    $validated = $request->validated();
    $employee = EmployeeProfile::create($validated);

    if ($request->session()->get('role_name') == 'Teacher') {
        $array = [
            'name' => $request->input('name'),
            'object' => null
        ];
        AdminPanel::create($array);
    }

    // Добавляем avatar в сессию с null, если он не загружен
    $request->session()->put('empl', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'years' => $request->input('years'),
        'pass' => $request->input('pass'),
        'repPass' => $request->input('repPass'),
        'about' => $request->input('about'),
        'avatar' => $employee->avatar ?? null // Добавляем avatar из модели или null
    ]);

    return redirect()->route('employee_profile.profile', ['employee' => $employee]);
})->name('employee_profile.store');
Route::get('employee_profile/profile/', function(Request $request) {

        $empl = $request->session()->get('empl');

        $role = $request->session()->get('role_name');


        return view('profile_employee.show', compact('empl', 'role'));
})->name('employee_profile.profile');













Route::post('employee_profile/avatar', function (Request $request) {

    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $employee = EmployeeProfile::where('email', $request->email)->firstOrFail();


        $path = $request->file('avatar')->store('avatars', 'public');

        $employee->update(['avatar' => $path]);

        $empl = $request->session()->get('empl');
        $empl['avatar'] = $path;
        $request->session()->put('empl', $empl);

        return redirect()->route('employee_profile.profile')->with('success', 'Аватар успешно обновлен');


    return redirect()->route('employee_profile.profile')->with('error', 'Ошибка при загрузке аватара');
})->name('avatar.uploade');

Route::resource('/group', GroupController::class);