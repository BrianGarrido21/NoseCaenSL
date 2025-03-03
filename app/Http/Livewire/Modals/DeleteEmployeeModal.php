<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Employee;

class DeleteEmployeeModal extends Component
{
    public $employeeId;
    public $showModal = false;

    protected $listeners = ['confirmDelete' => 'showDeleteModal', 'employeeDeleted' => '$refresh'];

    public function showDeleteModal($employeeId)
    {
        $this->employeeId = $employeeId;
        $this->showModal = true;
        $this->emit('modalOpened'); 
    }

    public function deleteEmployee()
    {
        Employee::findOrFail($this->employeeId)->delete();
        session()->flash('success', 'Employee deleted successfully.');

        return redirect()->route('employee.index');
    }

    public function resetModal()
    {
        $this->employeeId = null;
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modals.delete-employee-modal');
    }
}
