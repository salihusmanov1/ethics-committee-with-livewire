<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

#[Layout('livewire.app.form2')]
class Modal extends Component
{
   
    public function render()
    {
        return view('livewire.modal');
    }
}
