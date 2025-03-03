<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

/**
 * Class RoleController
 *
 * Controlador encargado de gestionar los roles del sistema, incluyendo su creación,
 * edición, eliminación y asignación de permisos.
 *
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Constructor que aplica middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read role')->only(['index', 'show']);
        $this->middleware('permission:create role')->only(['create', 'store']);
        $this->middleware('permission:update role')->only(['edit', 'update']);
        $this->middleware('permission:delete role')->only('destroy');
    }
    /**
     * Muestra la lista paginada de roles.
     *
     * @return View Vista con el listado de roles.
     */
    public function index(): View
    {
        $roles = Role::paginate(10);
        return view('employee.role.index', compact('roles'));
    }
    /**
     * Muestra el formulario para crear un nuevo rol.
     *
     * @return View Vista del formulario de creación de rol.
     */
    public function create(): View
    {
        return view('employee.role.create');
    }
    /**
     * Guarda un nuevo rol y sincroniza sus permisos.
     *
     * @param RoleRequest $request Datos validados del rol.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index')->with('success', __('Role created successfully.'));
    }
    /**
     * Muestra los detalles de un rol específico.
     *
     * @param Role $role Rol a mostrar.
     *
     * @return View Vista con los detalles del rol.
     */
    public function show(Role $role): View
    {
        return view('employee.role.show', compact('role'));
    }
    /**
     * Muestra el formulario para editar un rol.
     *
     * @param Role $role Rol a editar.
     *
     * @return View Vista del formulario de edición del rol.
     */
    public function edit(Role $role): View
    {
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('employee.role.edit', compact('rolePermissions', 'role'));
    }
    /**
     * Actualiza los datos de un rol y sincroniza sus permisos.
     *
     * @param RoleRequest $request Datos validados del rol.
     * @param Role $role Rol a actualizar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index')->with('success', __('Role updated successfully'));
    }

    /**
     * Elimina un rol del sistema.
     *
     * @param Role $role Rol a eliminar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', __('Role deleted successfully'));
    }
}
