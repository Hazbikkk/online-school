<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;
use App\Models\Employee;
use Illuminate\Support\Facades\URL;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Roles::all();
        return view('employee.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreEmployeeRequest $request)
    {
        // Валидация входных данных
    $validated = $request->validate([
        'role_id' => 'required|string',
    ]);

    // Сохраняем выбранную роль в сессии
    $request->session()->put('role_name', $validated['role_id']);

    // Перенаправляем на маршрут /ref с параметром role_id
    return Redirect::route('ref', ['role_id' => $validated['role_id']]);
    }

    public function refssilkaStore(StoreEmployeeRequest $request)
    {

        // Получаем role_id из query-параметра
    $role_id = $request->query('role_id');
    
    // Сохраняем роль в сессии, только если role_id передан
    if ($role_id) {
        $request->session()->put('role_name', $role_id);
    }
    
    // Создаем временную подписанную ссылку
    $refssilka = URL::temporarySignedRoute('profile_employee', now()->addMinutes(30));
    
    return view('ref.index', ['refssilka' => $refssilka]);

    }

    public function StoreEmployeeInDB(StoreEmployeeRequest $request)
    {
        $role_name = $request->session()->get('role_name');
        $roles = Roles::all(); // Или статический список ролей
        return view('profile_employee.create', [
        'role_name' => $role_name,
        'roles' => $roles
        ]);
    }

}
