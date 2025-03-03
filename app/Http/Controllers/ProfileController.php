<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class ProfileController
 *
 * Controlador encargado de gestionar la edición y actualización del perfil del empleado autenticado.
 *
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Muestra el formulario para editar el perfil del empleado.
     *
     * @return View Vista del formulario de edición del perfil.
     */
    public function edit(): View
    {
        return view('profile.edit');
    }

    /**
     * Actualiza la información del perfil del empleado autenticado.
     *
     * Valida los datos enviados y actualiza los campos del perfil, como nombre y correo electrónico.
     *
     * @param ProfileUpdateRequest $request Solicitud validada con los datos del perfil.
     *
     * @return RedirectResponse Redirección al dashboard con mensaje de éxito.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::guard('employee')->user();
        
        $validatedData = $request->validated();

        $user->update([
            'name' => $validatedData['name'] ?? $user->name,
            'email' => $validatedData['email'] ?? $user->email,
        ]);

        return Redirect::route('employee.dashboard')->with('status', 'Profile updated successfully.');
    }

}
