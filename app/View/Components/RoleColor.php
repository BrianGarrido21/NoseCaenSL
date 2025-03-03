<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoleColor extends Component
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function render()
    {
        return view('components.role-color');
    }
}
