<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layout.app')]
class ChecklistForm extends Component
{
    public $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
    public function render()
    {
        return view('livewire.app.checklist-form');
    }
}
