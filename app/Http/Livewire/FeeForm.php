<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class FeeForm extends Component
{
    public $globalFee = false;
    public $users;
    public $formAction;

    public function mount()
    {
        $this->users = User::all();
        $this->setFormAction();
    }

    public function updatedGlobalFee()
    {
        $this->setFormAction();
    }

    public function setFormAction()
    {
        $this->formAction = $this->globalFee ? route('global.fee') : route('fee.store');
    }

    public function render()
    {
        return view('livewire.fee-form');
    }
}
