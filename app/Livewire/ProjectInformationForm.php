<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\Form2 as ModelsForm2;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;


#[Layout('layout.app')]

class ProjectInformationForm extends Component
{

    #[Rule('required')]
    public $question_1;

    #[Rule('required')]
    public $question_2;

    #[Rule('required')]
    public $question_3;

    #[Rule('required_if:radioButtons1,yes')]
    public $question_4;

    #[Rule('required')]
    public $radioButtons1;

    public function showOtherInput()
    {
        if ($this->radioButtons1 !== "yes") {
            $this->question_4 = '';
        }
    }

    #[Rule('required_if:radioButtons2,yes')]
    public $question_5;

    #[Rule('required')]
    public $radioButtons2;

    public function showOtherInput1()
    {
        if ($this->radioButtons2 !== "yes") {
            $this->question_5 = '';
        }
    }

    #[Rule('required')]
    public $question_6;

    #[Rule('required_if:radioButtons3,yes')]
    public $question_7;


    #[Rule('required')]
    public $radioButtons3;

    public function showOtherInput2()
    {
        if ($this->radioButtons3 !== "yes") {
            $this->question_7 = '';
        }
    }

    #[Rule('required')]
    public $rname;

    #[Rule('required')]
    public $sname;

    public function createForm2()
    {
       $validated = $this->validate();

        try {

            $app = AppStatus::create([
                'user_id' => auth()->user()->id,
                'form_type' => 2,
                'status' => 'New',
                'user_email' => auth()->user()->email
            ]);

            ModelsForm2::create([
                'user_id' => auth()->user()->id,
                'app_id' => $app->id,
                'question_1' => $this->question_1,
                'question_2' => $this->question_2,
                'question_3' => $this->question_3,
                'question_4' => $this->question_4,
                'question_5' => $this->question_5,
                'question_6' => $this->question_6,
                'question_7' => $this->question_7,
                'rname' => $this->rname,
                'sname' => $this->sname
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

    public $pageName = "ETHICS COMMITTEE PROJECT INFORMATION FORM";

    public function render()
    {
        return view('livewire.app.project-information-form');
    }
}
