<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Status;

class DeleteStatusModal extends Component
{
    public $statusId;
    public $showModal = false;

    protected $listeners = ['confirmDelete' => 'showDeleteModal', 'statusDeleted' => '$refresh'];

    public function showDeleteModal($statusId)
    {
        $this->statusId = $statusId;
        $this->showModal = true;
    }

    public function deleteStatus()
    {
        Status::findOrFail($this->statusId)->delete();
        session()->flash('success', 'Status deleted successfully.');
        return redirect()->route('statuses.index');
    }

    public function resetModal()
    {
        $this->statusId = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modals.delete-status-modal');
    }
}
