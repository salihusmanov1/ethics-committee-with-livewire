<?php

namespace App\Livewire;

use App\Models\Form1;
use Livewire\Attributes\Layout;

use Livewire\Component;

#[Layout('layout.app')]
class ConsentForm extends Component
{

    public $attached_app_id = '';

    public $researcher;
    public $researcher_name;
    public $researcher_institution;
    public $researcher_title;
    public $researcher_email;
    public $researcher_phone;

    public function displayFormDatas() {
        
        $form = Form1::where('app_id', $this->attached_app_id)->first();
        $this->researcher = json_decode($form->researchers);
        $this->researcher_name = $this->researcher->name;
        $this->researcher_institution = $this->researcher->institution;
        $this->researcher_title = $form->title_of_study;
        $this->researcher_email = $this->researcher->email;
        $this->researcher_phone = $this->researcher->phone;


    }

    public $pageName = "Ethics Committee Informed Consent Form ";
    public function render()
    {
        $forms = Form1::where('user_id', auth()->user()->id)->get();
        return view('livewire.app.consent-form', ['forms' => $forms]);
    }
}
