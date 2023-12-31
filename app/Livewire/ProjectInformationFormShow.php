<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\Form2;
use Livewire\Attributes\Layout;
use Livewire\Component;



#[Layout('layout.app')]

class ProjectInformationFormShow extends Component
{


   public $data;
   public $form;

    public function mount($formId) {

        $this->data = AppStatus::find($formId);
        $this->form = Form2::where('app_id', $formId)->first();
    }

    public $pageName = "ETHICS COMMITTEE PROJECT INFORMATION FORM";
    public function render()
    {
        return view('livewire.app.show.project-information-form');
    }
}
