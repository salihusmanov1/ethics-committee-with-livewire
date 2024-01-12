<?php

namespace App\Livewire;

use App\Models\Consentform as ModelsConsentform;
use App\Models\Form1;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

#[Layout('layout.app')]
class ConsentFormShow extends Component
{

    public $attached_app_id = '';

    public $researcher_name;
    public $researcher_institution;
    public $researcher_title;
    public $researcher_email;
    public $researcher_phone;

    #[Rule('required')]
    public $survey;
    #[Rule('required')]
    public $start_date;
    #[Rule('required')]
    public $end_date;
    #[Rule('required')]
    public $type;
    #[Rule('required')]
    public $question_1;
    #[Rule('required')]
    public $question_2;
    #[Rule('required')]
    public $question_3;


    public $consent_form;

    public function mount($formId)
    {
        $this->consent_form = ModelsConsentform::where('id', $formId)->first();

        $this->researcher_name = $this->consent_form->r_full_name;
        $this->researcher_institution = $this->consent_form->institue;
        $this->researcher_title = $this->consent_form->title;
        $this->researcher_email = $this->consent_form->email;
        $this->researcher_phone = $this->consent_form->phone_no;
        $this->survey = $this->consent_form->survey;
        $this->start_date = $this->consent_form->start_date;
        $this->end_date = $this->consent_form->end_date;
        $this->type = $this->consent_form->type;
        $this->question_1 = $this->consent_form->question_1;
        $this->question_2 = $this->consent_form->question_2;
        $this->question_3 = $this->consent_form->question_3;
    }

    public $readonlyInputs = true;
    public function enableEdit()
    {
        $this->readonlyInputs = !$this->readonlyInputs;
    }

    public function updateConsentForm()
    {
        $validated = $this->validate();

        try {
            $this->consent_form->update([
                
                'survey' => $this->survey,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'type' => $this->type,
                'question_1' => $this->question_1,
                'question_2' => $this->question_2,
                'question_3' => $this->question_3,
                
            ]);

            Session::flash('success', 'Your form has been updated successfully.');
        } catch (QueryException $e) {

            Log::error("SQL Error: " . $e->getMessage());
            Session::flash('error', 'An error occurred while saving the form. Please try again.');
        }
        if ($validated) {
            $this->dispatch('show-modal');
        }
    }

    public function deleteConsentForm()
    {
        $this->consent_form->delete();

        Session::flash('success', 'Your form has been deleted successfully.');
        $this->dispatch('show-modal');
    }


    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }

    public $pageName = "Ethics Committee Informed Consent Form ";
    public function render()
    {

        return view('livewire.app.show.consent-form');
    }
}
