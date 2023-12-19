<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.app')]

class Form2 extends Component
{
    public $pageName = "ETHICS COMMITTEE PROJECT INFORMATION FORM";
    public function render()
    {
        return view('livewire.app.form2');
    }
}
