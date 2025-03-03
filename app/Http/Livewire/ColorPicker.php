<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ColorPicker extends Component
{

    public $value = '#000000';

    public function mount($value = '#000000')
    {
        $this->value = $value;
    }

    public function render()
    {
        return view('livewire.color-picker');
    }
}
