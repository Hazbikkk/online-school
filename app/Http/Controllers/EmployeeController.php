<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;
use App\Models\Employee;

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
