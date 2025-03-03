<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * Class EmployeeAuthenticate
 *
 * Middleware encargado de verificar si un empleado está autenticado
 * antes de permitir el acceso a rutas protegidas.
 *
 * Si el empleado no está autenticado, redirige al formulario de login.
 *
 * @package App\Http\Middleware
 */
class EmployeeAuthenticate
{
    /**
     * Maneja la solicitud entrante y verifica la autenticación del empleado.
     *
     * @param Request $request La solicitud HTTP entrante.
     * @param Closure $next Función de continuación para procesar la solicitud.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * Redirección al login si no está autenticado o continúa con la solicitud.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('employee')->check()) {
            return $next($request);
        }
        return redirect()->route('employee.login.form');
    }
}
