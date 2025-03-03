<?php

namespace App\Http\Livewire\Modals;
namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\User;

class DeleteUserModal extends Component
{
    public $userId;
    public $showModal = false;

    protected $listeners = ['confirmDelete' => 'showDeleteModal'];

    public function showDeleteModal($userId)
    {
        $this->userId = $userId;
        $this->showModal = true;
        $this->emit('modalOpened');
    }

    public function deleteUser()
    {
        User::findOrFail($this->userId)->delete();
        session()->flash('success', 'User deleted successfully.');

        // Recargar la página después de eliminar
        return redirect()->route('user.index'); // Asegúrate de usar la ruta correcta
    }

    public function resetModal()
    {
        $this->userId = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modals.delete-user-modal');
    }
}
