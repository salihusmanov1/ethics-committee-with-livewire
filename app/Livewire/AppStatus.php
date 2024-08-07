<?php

namespace App\Livewire;

use App\Models\AppStatus as ModelsAppStatus;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;


#[Layout('layout.app')]
class AppStatus extends Component
{
    #[On('dataSent')]
    public function handleFormsShow($formType, $formId)
    {

        if ($formType == 2) {
            $this->redirectRoute('project-information-form-show', ['formId' => $formId], navigate: true);
        }
        if ($formType == 1) {
            $this->redirectRoute('application-form-show', ['formId' => $formId], navigate: true);
        }
    }

    public $pageName = "APPLICATION STATUS";
    public function render()
    {
        if (auth()->user()->role_id == 1) {
            $datas = ModelsAppStatus::where('user_id', auth()->user()->id)->with('form')->get();
        } else {
            $datas = ModelsAppStatus::with('form')->get();
        }


        return view('livewire.app.app-status', [
            'datas' => $datas
        ]);
    }
}
