<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
use App\Http\Requests\StoreAdminPanelRequest;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $teachers = AdminPanel::paginate(10);

        return view('adminPanel.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminPanelRequest $request)
    {
        $validated = $request->validated();
        AdminPanel::create($validated);
        return redirect()->route('adminPanel.index')->with('success', 'Учитель добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = AdminPanel::findOrFail($id);

        return view('adminPanel.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = adminPanel::findOrFail($id);

        return view('adminPanel.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAdminPanelRequest $request, string $id)
    {
        $validated = $request->validated();
        $teacher = AdminPanel::findOrFail($id);
        $teacher->update($validated);

        return redirect()->route('adminPanel.show', $teacher->id)->with('success', 'Учитель успешно обновлён!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = AdminPanel::findOrFail($id); // Находим запись или выбрасываем 404
        $teacher->delete(); // Удаляем запись
        
        return redirect()->route('adminPanel.index')->with('success', 'Учитель успешно удалён!');
    }
}
