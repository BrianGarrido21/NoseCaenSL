<?php

namespace App\Http\Livewire\Modals;

use App\Models\Role;
use Livewire\Component;

class DeleteRoleModal extends Component
{
    public $showModal = false;
    public $roleIdToDelete;

    protected $listeners = ['confirmDelete' => 'showDeleteModal'];

    // Mostrar el modal con el ID del rol
    public function showDeleteModal($roleId)
    {
        $this->roleIdToDelete = $roleId;
        $this->showModal = true;
    }

    // Cerrar el modal sin eliminar
    public function resetModal()
    {
        $this->showModal = false;
        $this->roleIdToDelete = null;
    }

    // Eliminar el rol y recargar la página
    public function deleteRole()
    {
        if ($this->roleIdToDelete) {
            Role::find($this->roleIdToDelete)->delete();
        }

        $this->resetModal();

        // Redirigir para recargar la página
        return redirect()->route('role.index'); // Asegúrate de usar la ruta correcta
    }

    public function render()
    {
        return view('livewire.modals.delete-role-modal');
    }
}