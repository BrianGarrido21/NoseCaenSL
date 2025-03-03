<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Fee;

class DeleteFeeModal extends Component
{
    public $feeId;
    public $showModal = false;

    protected $listeners = ['confirmDelete' => 'showDeleteModal', 'feeDeleted' => '$refresh'];

    public function showDeleteModal($feeId)
    {
        $this->feeId = $feeId;
        $this->showModal = true;
        $this->emit('modalOpened'); 
    }

    public function deleteFee()
    {
        Fee::findOrFail($this->feeId)->delete();
        session()->flash('success', 'Fee deleted successfully.');

        // Redirigir a la lista de fees después de eliminar
        return redirect()->route('fee.index');
    }

    public function resetModal()
    {
        $this->feeId = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modals.delete-fee-modal');
    }
}
