<?php

namespace App\Livewire;
use Livewire\Attributes\Layout;

use Livewire\Component;

#[Layout('layout.app')]
class ConsentForm extends Component
{
    public $pageName = "Ethics Committee Informed Consent Form ";
    public function render()
    {
        return view('livewire.app.consent-form');
    }
}
