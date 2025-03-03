<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PermissionSelector extends Component
{
    public $permissions;
    public $selectedPermissions = []; 

    public function mount($permissions, $rolePermissions = [])
    {
        $this->permissions = $permissions;


        $this->selectedPermissions = old('permissions', $rolePermissions);
    }

    public function selectAll()
    {
        if ($this->permissions && $this->permissions->isNotEmpty()) {
            if (count($this->selectedPermissions) === $this->permissions->count()) {
                $this->selectedPermissions = [];
            } else {
                $this->selectedPermissions = $this->permissions->pluck('id')->toArray();
            }
        }
    }

    public function render()
    {
        return view('livewire.permission-selector');
    }
}
