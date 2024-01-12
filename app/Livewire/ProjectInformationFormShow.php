<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\Form2;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;




#[Layout('layout.app')]

class ProjectInformationFormShow extends Component
{

    public $readonlyInputs = true;
    public function enableEdit()
    {
        $this->readonlyInputs = !$this->readonlyInputs;
    }

    #[Rule('required')]
    public $question_1;

    #[Rule('required')]
    public $question_2;

    #[Rule('required')]
    public $question_3;

    #[Rule('required')]
    public $question_4;

    #[Rule('required_if:question_4,yes')]
    public $question_4_1;
    public function showOtherInput()
    {

        if ($this->question_4 == 'no') {
            $this->question_4_1 = '';
        }
    }

    #[Rule('required')]
    public $question_5;

    #[Rule('required_if:question_5,yes')]
    public $question_5_1;
    public function showOtherInput1()
    {

        if ($this->question_5 == 'no') {
            $this->question_5_1 = '';
        }
    }

    #[Rule('required')]
    public $question_6;

    #[Rule('required')]
    public $question_7;

    #[Rule('required_if:question_7,yes')]
    public $question_7_1;

    public function showOtherInput2()
    {

        if ($this->question_7 == 'no') {
            $this->question_7_1 = '';
        }
    }

    #[Rule('required')]
    public $rname;

    #[Rule('required')]
    public $sname;


    public $data;
    public $form2;

    public function mount($formId)
    {

        $this->data = AppStatus::find($formId);
        $this->form2 = Form2::where('app_id', $formId)->first();

        $this->question_1 = $this->form2->question_1;
        $this->question_2 = $this->form2->question_2;
        $this->question_3 = $this->form2->question_3;
        $this->question_4 = $this->form2->question_4;
        $this->question_4_1 = $this->form2->question_4_1;
        $this->question_5 = $this->form2->question_5;
        $this->question_5_1 = $this->form2->question_5_1;
        $this->question_6 = $this->form2->question_6;
        $this->question_7 = $this->form2->question_7;
        $this->question_7_1 = $this->form2->question_7_1;
        $this->rname = $this->form2->rname;
        $this->sname = $this->form2->sname;
    }


    public function updateForm2()
    {

        $this->validate();

        try {

            $this->form2->update([
                'question_1' => $this->question_1,
                'question_2' => $this->question_2,
                'question_3' => $this->question_3,
                'question_4' => $this->question_4,
                'question_4_1' => $this->question_4_1,
                'question_5' => $this->question_5,
                'question_5_1' => $this->question_5_1,
                'question_6' => $this->question_6,
                'question_7' => $this->question_7,
                'question_7_1' => $this->question_7_1,
                'rname' => $this->rname,
                'sname' => $this->sname
            ]);

            Session::flash('success', 'Your form has been updated successfully.');
        } catch (QueryException $e) {

            Log::error("SQL Error: " . $e->getMessage());
            Session::flash('error', 'An error occurred while saving the form. Please try again.');
        }

        $this->dispatch('show-modal');
    }

    public function deleteForm2()
    {
        $this->form2->delete();
        $this->data->delete();
        Session::flash('success', 'Your form has been deleted successfully.');
        $this->dispatch('show-modal');
    }

    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }


    public $pageName = "ETHICS COMMITTEE PROJECT INFORMATION FORM";
    public function render()
    {
        return view('livewire.app.show.project-information-form');
    }
}
