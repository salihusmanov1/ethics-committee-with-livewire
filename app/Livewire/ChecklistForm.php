<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\ChecklistForm as ModelsChecklistForm;
use App\Models\Forms;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

#[Layout('layout.app')]
class ChecklistForm extends Component
{
    use WithFileUploads;

    #[Rule('required|file|mimes:pdf')]
    public $file1;

    #[Rule('required|file|mimes:pdf')]
    public $file2;

    #[Rule('required')]
    public $attach_form = '';

    #[Rule('required')]
    public $attach_parental = '';

    #[Rule('required')]
    public $debriefing = '';

    #[Rule('required')]
    public $question_1 = '';

    #[Rule('required')]
    public $question_2_a = '';

    #[Rule('required')]
    public $question_2_b = '';

    #[Rule('required')]
    public $question_3_a = '';

    #[Rule('required')]
    public $question_3_b = '';

    #[Rule('required')]
    public $question_3_c = '';

    #[Rule('required')]
    public $question_3_d = '';

    #[Rule('required')]
    public $question_3_e = '';

    #[Rule('required')]
    public $question_3_f = '';

    #[Rule('required')]
    public $question_3_g = '';

    #[Rule('required')]
    public $question_3_h = '';

    #[Rule('required')]
    public $question_3_i = '';

    #[Rule('required')]
    public $question_3_j = '';

    #[Rule('required')]
    public $question_3_k = '';

    #[Rule('required')]
    public $question_4 = '';

    #[Rule('required')]
    public $question_5 = '';

    #[Rule('required')]
    public $question_6 = '';

    #[Rule('required')]
    public $question_7 = '';

    public $section7;
    public function showSectionOf7()
    {
        if ($this->question_7 === "Yes") {
            $this->section7 = true;
        } else
            $this->section7 = false;
    }


    #[Rule('required_if:question_7,Yes')]
    public $question_7_a = '';

    #[Rule('required_if:question_7,Yes')]
    public $question_7_b = '';

    #[Rule('required_if:question_7,Yes')]
    public $question_7_c = '';

    #[Rule('required')]
    public $question_8 = '';

    public $section8;
    public function showSectionOf8()
    {
        if ($this->question_8 === "Yes") {
            $this->section8 = true;
        } else
            $this->section8 = false;
    }

    #[Rule('required_if:question_8,Yes')]
    public $question_8_a = '';

    #[Rule('required_if:question_8,Yes')]
    public $question_8_b = '';

    #[Rule('required_if:question_8,Yes')]
    public $question_8_c = '';

    #[Rule('required_if:question_8,Yes')]
    public $question_8_d_i = '';

    #[Rule('required_if:question_8,Yes')]
    public $question_8_d_ii = '';

    #[Rule('required_if:question_8,Yes')]
    public $question_8_d_iii = '';

    #[Rule('required')]
    public $question_9 = '';

    #[Rule('required')]
    public $question_10 = '';

    #[Rule('required')]
    public $question_11 = '';


    public function checkValidation()
    {
        $validated = $this->validate();
        if ($validated)
            $this->dispatch('showAttachFormModal');
    }

    public $attached_app_id;

    public function createChecklist()
    {
        
        $filePath1 = $this->file1->store('uploads', 'public');

        $filePath2 = $this->file2->store('uploads', 'public');

        try {
            ModelsChecklistForm::create([
                'user_id' => auth()->user()->id,
                'app_id' => $this->attached_app_id,
                'attach_form' => $this->attach_form,
                'attach_parental'  => $this->attach_parental,
                'debriefing' => $this->debriefing,
                'file1' => $filePath1,
                'file2' => $filePath2,
                'question_1' => $this->question_1,
                'question_2_a' => $this->question_2_a,
                'question_2_b' => $this->question_2_b,
                'question_3_a' => $this->question_3_a,
                'question_3_b'  => $this->question_3_b,
                'question_3_c' => $this->question_3_c,
                'question_3_d' => $this->question_3_d,
                'question_3_e' => $this->question_3_e,
                'question_3_f' => $this->question_3_f,
                'question_3_g' => $this->question_3_g,
                'question_3_h' => $this->question_3_h,
                'question_3_i' => $this->question_3_i,
                'question_3_j' => $this->question_3_j,
                'question_3_k' => $this->question_3_k,
                'question_4' => $this->question_4,
                'question_5' => $this->question_5,
                'question_6' => $this->question_6,
                'question_7' => $this->question_7,
                'question_7_a' => $this->question_7_a,
                'question_7_b' => $this->question_7_b,
                'question_7_c' => $this->question_7_c,
                'question_8' => $this->question_8,
                'question_8_a' => $this->question_8_a,
                'question_8_b' => $this->question_8_b,
                'question_8_c' => $this->question_8_c,
                'question_8_d_i' => $this->question_8_d_i,
                'question_8_d_ii' => $this->question_8_d_ii,
                'question_8_d_iii' => $this->question_8_d_iii,
                'question_9' => $this->question_9,
                'question_10' => $this->question_10,
                'question_11' => $this->question_11
            ]);

            Session::flash('success', 'Your form has been updated successfully.');
        } catch (QueryException $e) {
            Log::error("SQL Error: " . $e->getMessage());
            Session::flash('error', 'An error occurred while saving the form. Please try again.');
        }
        $this->dispatch('showMessageModal');
    }

    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }


    public $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
    public function render()
    {
        $userId = auth()->user()->id;
        $datas = AppStatus::whereDoesntHave('Checklist', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        return view('livewire.app.checklist-form',  ['datas' => $datas]);
    }
}
