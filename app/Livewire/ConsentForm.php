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
class ConsentForm extends Component
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

    public function displayFormDatas()
    {

        $form = Form1::where('id', $this->attached_app_id)->first();
        $this->researcher_name = $form->r_full_name;
        $this->researcher_institution = $form->r_institute;
        $this->researcher_title = $form->title_of_study;
        $this->researcher_email = $form->r_email;
        $this->researcher_phone = $form->r_phone_no;
    }

    public function createConsentForm()
    {
        $validated = $this->validate();

        try {
            ModelsConsentform::create([
                'r_full_name' => $this->researcher_name,
                'institue' => $this->researcher_institution,
                'survey' => $this->survey,
                'title' => $this->researcher_title,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'type' => $this->type,
                'question_1' => $this->question_1,
                'question_2' => $this->question_2,
                'question_3' => $this->question_3,
                'email' => $this->researcher_email,
                'phone_no' => $this->researcher_phone,
                'app_form_id' => $this->attached_app_id
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

    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }

    public $pageName = "Ethics Committee Informed Consent Form ";
    public function render()
    {
        $userId = auth()->user()->id;
        $forms = Form1::whereDoesntHave('consentForm', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('livewire.app.consent-form', ['forms' => $forms]);
    }
}
