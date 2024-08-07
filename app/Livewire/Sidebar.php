<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{

    public $isActive = false;

    public function showSubList()
    {
        $this->isActive = !$this->isActive;
        
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
