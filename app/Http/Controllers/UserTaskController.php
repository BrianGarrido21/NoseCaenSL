<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Task;
use App\Models\User;
use App\Rules\ExistsUserByCIF;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserTaskController extends Controller
{
    public function create()
    {
        return Inertia::render('Tasks/Create', [
            'provinces' => Province::all()
        ]);
    }


    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'cif' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', new ExistsUserByCIF($request->input('cif'))],
            'email' => 'required|email|max:255',
            'postal_code' => 'required|string|max:10',
            'finish_date' => 'required|date',
            'province_id' => 'required|integer|exists:tbl_provincias,cod',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'pre_notes' => 'nullable|string',
        ]);

        // Obtener el usuario
        $user = User::where('cif', $validated['cif'])->first();
        // Crear la tarea
        Task::create([
            'user_id' => $user->id,
            'cif' => $validated['cif'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'postal_code' => $validated['postal_code'],
            'finish_date' => $validated['finish_date'],
            'province_id' => $validated['province_id'],
            'status_id' => 2,
            'address' => $validated['address'],
            'description' => $validated['description'],
            'pre_notes' => $validated['pre_notes'] ?? null,
        ]);
        // Redirigir con un mensaje de éxito
        return redirect()->route('success');
    }
}
