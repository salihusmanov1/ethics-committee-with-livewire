<?php

namespace App\Livewire;

use App\Models\AppStatus;
use Livewire\Attributes\Layout;
use App\Models\ChecklistForm;
use Livewire\Component;


#[Layout('layout.app')]

class ChecklistFormShow extends Component
{

    public $form;
    public $data;

    public function mount($formId)
    {
        $this->data = AppStatus::where('checklist_form_id', $formId)->first();
        $this->form = ChecklistForm::where('id', $formId)->first();
    }
    public $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
    public function render()
    {
        return view('livewire.app.show.checklist-form');
    }
}
