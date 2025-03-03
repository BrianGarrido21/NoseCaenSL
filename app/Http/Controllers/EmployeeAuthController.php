<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class EmployeeAuthController
 *
 * Controlador encargado de gestionar la autenticación de empleados.
 *
 * @package App\Http\Controllers
 */
class EmployeeAuthController extends Controller
{
    /**
     * Muestra el formulario de login para empleados.
     *
     * @return View Vista del formulario de inicio de sesión para empleados.
     */
    public function showLoginForm(): View
    {
        return view('auth.employee-login');
    }

    /**
     * Procesa el inicio de sesión de un empleado.
     *
     * Valida las credenciales ingresadas y, si son correctas, inicia sesión
     * y redirige al dashboard del empleado. Si las credenciales son inválidas,
     * retorna al formulario de login con errores.
     *
     * @param Request $request Datos enviados desde el formulario de login.
     *
     * @return RedirectResponse Redirección al dashboard o de vuelta al login con errores.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('employee')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('employee.dashboard'));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Cierra la sesión del empleado autenticado.
     *
     * Invalida la sesión actual y regenera el token de sesión
     * para evitar ataques CSRF, redirigiendo nuevamente al login.
     *
     * @param Request $request Solicitud actual para invalidar la sesión.
     *
     * @return RedirectResponse Redirección al formulario de login.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employee.login.form');
    }
}
