<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
/**
 * Class StatusController
 *
 * Controlador encargado de la gestión de estados (statuses) dentro del sistema,
 * permitiendo crear, visualizar, actualizar y eliminar estados, con control de permisos.
 *
 * @package App\Http\Controllers
 */
class StatusController extends Controller
{
    /**
     * Constructor que aplica middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read status')->only(['index', 'show']);
        $this->middleware('permission:create status')->only(['create', 'store']);
        $this->middleware('permission:update status')->only(['edit', 'update']);
        $this->middleware('permission:delete status')->only('destroy');
    }
    /**
     * Muestra el listado de estados.
     *
     * @return View Vista con el listado de estados.
     */
    public function index(): View
    {
        return view('employee.status.index');
    }
    /**
     * Muestra el formulario para crear un nuevo estado.
     *
     * @return View Vista del formulario de creación de estado.
     */
    public function create(): View
    {
        return view('employee.status.create');
    }
    /**
     * Guarda un nuevo estado en el sistema.
     *
     * @param StatusRequest $request Datos validados del estado.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function store(StatusRequest $request): RedirectResponse
    {
        Status::create($request->all());
        return redirect()->route('status.index')->with('success', __('Status created successfully'));
    }
    /**
     * Muestra los detalles de un estado específico.
     *
     * @param Status $status Estado a mostrar.
     *
     * @return View Vista con los detalles del estado.
     */
    public function show(Status $status): View
    {
        return view('employee.status.show', compact('status'));
    }
    /**
     * Muestra el formulario para editar un estado.
     *
     * @param Status $status Estado a editar.
     *
     * @return View Vista del formulario de edición del estado.
     */
    public function edit(Status $status): View
    {
        return view('employee.status.edit', compact('status'));
    }
    /**
     * Actualiza los datos de un estado.
     *
     * @param StatusRequest $request Datos validados del estado.
     * @param Status $status Estado a actualizar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function update(StatusRequest $request, Status $status): RedirectResponse
    {
        $status->update($request->all());
        return redirect()->route('status.index')->with('success', __('Status updated successfully'));
    }

    /**
     * Elimina un estado del sistema.
     *
     * @param Status $status Estado a eliminar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function destroy(Status $status): RedirectResponse
    {
        $status->delete();
        return redirect()->route('status.index')->with('success', __('Status deleted successfully'));
    }
}
