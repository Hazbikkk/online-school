<?php

namespace App\Http\Controllers;

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

class EmployeeProfileController extends Controller
{

    public static $about;

    public static function storeProfile(EmployeeProfileRequest $request)
    {
        $employee_one = $request->validate(
            [
                'name' => 'required',
                'object' => 'required',
                'email' => 'required',
                'years' => 'required',
                'pass' => 'required',
                'repPass' => 'required',
                'about' => 'required',
            ]
        );
        $employee = EmployeeProfile::create($employee_one);

    if ($request->session()->get('role_name') == 'Teacher') {
        $array = [
            'name' => $request->input('name'),
            'object' => $request->input('object'),
        ]; 
        AdminPanel::create($array);
    }

    // Добавляем avatar в сессию с null, если он не загружен
    $request->session()->put('empl', [
        'name' => $request->input('name'),
        'object' => $request->input('object'),
        'email' => $request->input('email'),
        'years' => $request->input('years'),
        'pass' => $request->input('pass'),
        'repPass' => $request->input('repPass'),
        'about' => $request->input('about'),
        'avatar' => $employee->avatar ?? null // Добавляем avatar из модели или null
    ]);

    $role = $request->session()->get('role_id');

    return redirect()->route('employee_profile.profile', ['employee' => $employee, 'role' => $role]);

    }

    public function avatarLoad(Request $request)
    {
            $request->validate(
                [
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

        $employee = EmployeeProfile::where('email', $request->email)->firstOrFail();


        $path = $request->file('avatar')->store('avatars', 'public');

        $employee->update(['avatar' => $path]);

        $empl = $request->session()->get('empl');
        $empl['avatar'] = $path;
        $request->session()->put('empl', $empl);

        return redirect()->route('employee_profile.profile')->with('success', 'Аватар успешно обновлен');
    }

    public function showProfile(EmployeeProfileRequest $request)
    {
        $empl = $request->session()->get('empl');

        $role = $request->session()->get('role_name');

        $role_name = ['role' => $role];

        $request->session()->put('isTeacher', true);


        return view('profile_employee.show', compact('empl', 'role', 'role_name'));
    }
}
