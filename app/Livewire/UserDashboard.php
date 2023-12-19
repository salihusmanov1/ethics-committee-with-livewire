<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layout.app')]
class UserDashboard extends Component
{
    public $pageName = 'HOME';
    public function render()
    {
        return view('livewire.app.user-dashboard');
    }
}
