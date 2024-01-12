<?php

namespace App\Livewire;

use App\Models\AppStatus;
use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\User;


#[Layout('layout.app')]
class AdminDashboard extends Component
{
    public $apps;
    public $newApps = 0;
    public $approvedApps = 0;
    public $pendingApps = 0;
    public $users;

    public function mount()
    {
        $this->apps = AppStatus::all();
        foreach ($this->apps as $app) {
            if ($app->status === 'New') {
                $this->newApps++;
            }
            if ($app->status === 'Approved') {
                $this->approvedApps++;
            }
            if ($app->status === 'Pending') {
                $this->pendingApps++;
            }
        }

        $this->users = User::where('role_id', 1)->latest('created_at')->get();
    }


    public $pageName = 'Admin Dashboard';
    public function render()
    {
        return view('livewire.app.admin-dashboard');
    }
}
