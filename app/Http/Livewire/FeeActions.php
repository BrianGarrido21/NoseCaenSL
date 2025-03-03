<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fee;

class FeeActions extends Component
{
    public Fee $fee;

    public function render()
    {
        return view('livewire.fee-actions');
    }

    public function deleteFee()
    {
        $this->emit('confirmDelete', $this->fee->id);
    }
}
