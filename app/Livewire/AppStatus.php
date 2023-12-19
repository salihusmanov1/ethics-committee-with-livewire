<?php

namespace App\Livewire;

use App\Models\AppStatus as ModelsAppStatus;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layout.app')]
class AppStatus extends Component
{

    public $pageName = "APPLICATION STATUS";
    public function render()
    {
        if (auth()->user()->role_id == 1) {
            $datas = ModelsAppStatus::where('user_id', auth()->user()->id)->with('form')->get();
        } else {
            $datas = ModelsAppStatus::with('form')->all();
        }
      

        return view('livewire.app.app-status', [
            'datas' => $datas
        ]);
    }
}
