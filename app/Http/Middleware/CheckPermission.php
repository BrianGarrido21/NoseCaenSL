<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
/**
 * Class CheckPermission
 *
 * Middleware encargado de verificar si el empleado autenticado tiene
 * un permiso específico antes de permitirle continuar con la solicitud.
 *
 * Si el empleado no está autenticado o no cuenta con el permiso requerido,
 * devuelve un error 403.
 *
 * @package App\Http\Middleware
 */
class CheckPermission
{
    /**
     * Maneja la solicitud entrante y verifica el permiso del empleado.
     *
     * @param \Illuminate\Http\Request $request La solicitud entrante.
     * @param \Closure $next Función de continuación para la solicitud.
     * @param string $permission Nombre del permiso requerido.
     *
     * @return mixed Continuación de la solicitud si el permiso es válido.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException Si no tiene permisos.
     */
    public function handle($request, Closure $next, $permission)
    {
        $employee = Auth::guard('employee')->user();

        if (!$employee || !$employee->can($permission)) {
            abort(403, __('Eres un chupapinga'));
        }

        return $next($request);
    }
}
