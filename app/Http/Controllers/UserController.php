<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController
 *
 * Controlador encargado de la gestión de usuarios del sistema,
 * permitiendo crear, visualizar, actualizar y eliminar usuarios,
 * así como asignar su país y divisa correspondiente.
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Constructor que aplica middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read user')->only(['index', 'show']);
        $this->middleware('permission:create user')->only(['create', 'store']);
        $this->middleware('permission:update user')->only(['edit', 'update']);
        $this->middleware('permission:delete user')->only('destroy');
    }
    /**
     * Muestra el listado paginado de usuarios.
     *
     * @return \Illuminate\View\View Vista con el listado de usuarios.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('employee.user.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return \Illuminate\View\View Vista del formulario de creación de usuario.
     */
    public function create()
    {
        return view('employee.user.create');
    }
    /**
     * Guarda un nuevo usuario en la base de datos.
     *
     * Obtiene la divisa del país seleccionado y la asigna al usuario.
     *
     * @param UserRequest $request Datos validados del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function store(UserRequest $request)
    {
        $country = DB::table('paises')->where('id', $request->country_id)->first();
        $user = User::create([
            'cif' => $request->cif,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'credit_card' => $request->credit_card,
            'currency_iso' => $country ? strtolower($country->iso_moneda) : null,
        ]);
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    /**
     * Muestra los detalles de un usuario específico.
     *
     * @param User $user Usuario a mostrar.
     *
     * @return \Illuminate\View\View Vista con los detalles del usuario.
     */
    public function show(User $user)
    {
        return view('employee.user.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     *
     * @param User $user Usuario a editar.
     *
     * @return \Illuminate\View\View Vista del formulario de edición del usuario.
     */
    public function edit(User $user)
    {
        return view('employee.user.edit', compact('user'));
    }

    /**
     * Actualiza los datos de un usuario.
     *
     * Actualiza la información del usuario y su divisa según el país.
     *
     * @param UserRequest $request Datos validados del usuario.
     * @param User $user Usuario a actualizar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function update(UserRequest $request, User $user)
    {
        $country = DB::table('paises')->where('id', $request->country_id)->first();

        $user->update([
            'cif' => $request->cif,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'currency_iso' => $country ? strtolower($country->iso_moneda) : null,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    /**
     * Elimina un usuario del sistema.
     *
     * @param User $user Usuario a eliminar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
