<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class EmployeeActions extends Component
{
    public Employee $employee;

    public function render()
    {
        return view('livewire.employee-actions');
    }

    public function deleteEmployee()
    {
        if (Auth::guard('employee')->user()->can('delete employee')) {
            $this->employee->delete();
            $this->emit('refreshDatatable');
            session()->flash('message', __('Employee deleted successfully.'));
        }
    }
}
