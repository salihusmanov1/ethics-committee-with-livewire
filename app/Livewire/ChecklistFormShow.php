<?php

namespace App\Livewire;

use App\Models\AppStatus;
use Livewire\Attributes\Layout;
use App\Models\ChecklistForm;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


#[Layout('layout.app')]

class ChecklistFormShow extends Component
{
    use WithFileUploads;

    public $file1;

    public function deleteFile1()
    {
        Storage::disk('public')->delete($this->checklist_form->file1);
        $this->checklist_form->update(['file1' => null]);
    }

    public $file2;

    public function deleteFile2()
    {
        Storage::disk('public')->delete($this->checklist_form->file2);
        $this->checklist_form->update(['file2' => null]);
    }

    public $file3;

    public function deleteFile3()
    {
        Storage::disk('public')->delete($this->checklist_form->file3);
        $this->checklist_form->update(['file3' => null]);
    }

    public $file1_old;
    public $file2_old;
    public $file3_old;

    #[Rule('required')]
    public $attach_parental = '';

    #[Rule('required')]
    public $debriefing = '';

    #[Rule('required')]
    public $tools;

    #[Rule('required_if:tools,Yes')]
    public $tools_text;

    #[Rule('required')]
    public $permission;

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

    public function showSectionOf7()
    {
        if ($this->question_7 !== "Yes") {
            $this->reset([
                'question_7_a',
                'question_7_b',
                'question_7_c'
            ]);
        }
    }


    #[Rule('required_if:question_7,Yes')]
    public $question_7_a = '';

    #[Rule('required_if:question_7,Yes')]
    public $question_7_b = '';

    #[Rule('required_if:question_7,Yes')]
    public $question_7_c = '';

    #[Rule('required')]
    public $question_8 = '';


    public function showSectionOf8()
    {
        if ($this->question_8 !== "Yes") {
            $this->reset([
                'question_8_a',
                'question_8_b',
                'question_8_c',
                'question_8_d_i',
                'question_8_d_ii',
                'question_8_d_iii'
            ]);
        }
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


    public $checklist_form;
    public $data;

    public $readonlyInputs = true;
    public function enableEdit()
    {
        $this->readonlyInputs = !$this->readonlyInputs;
    }

    public function mount($formId)
    {
        $this->checklist_form = ChecklistForm::where('id', $formId)->first();

        $this->attach_parental = $this->checklist_form->attach_parental;
        $this->debriefing = $this->checklist_form->debriefing;
        $this->tools = $this->checklist_form->tools;
        $this->tools_text = $this->checklist_form->tools_text;
        $this->permission = $this->checklist_form->permission;
        $this->file1_old = asset('storage/' . $this->checklist_form->file1);
        $this->file2_old = asset('storage/' . $this->checklist_form->file2);
        $this->file3_old = asset('storage/' . $this->checklist_form->file3);
        $this->question_1 = $this->checklist_form->question_1;
        $this->question_2_a = $this->checklist_form->question_2_a;
        $this->question_2_b = $this->checklist_form->question_2_b;
        $this->question_3_a = $this->checklist_form->question_3_a;
        $this->question_3_b = $this->checklist_form->question_3_b;
        $this->question_3_c = $this->checklist_form->question_3_c;
        $this->question_3_d = $this->checklist_form->question_3_d;
        $this->question_3_e = $this->checklist_form->question_3_e;
        $this->question_3_f = $this->checklist_form->question_3_f;
        $this->question_3_g = $this->checklist_form->question_3_g;
        $this->question_3_h = $this->checklist_form->question_3_h;
        $this->question_3_i = $this->checklist_form->question_3_i;
        $this->question_3_j = $this->checklist_form->question_3_j;
        $this->question_3_k = $this->checklist_form->question_3_k;
        $this->question_4 = $this->checklist_form->question_4;
        $this->question_5 = $this->checklist_form->question_5;
        $this->question_6 = $this->checklist_form->question_6;
        $this->question_7 = $this->checklist_form->question_7;
        $this->question_7_a = $this->checklist_form->question_7_a;
        $this->question_7_b = $this->checklist_form->question_7_b;
        $this->question_7_c = $this->checklist_form->question_7_c;
        $this->question_8 = $this->checklist_form->question_8;
        $this->question_8_a = $this->checklist_form->question_8_a;
        $this->question_8_b = $this->checklist_form->question_8_b;
        $this->question_8_c = $this->checklist_form->question_8_c;
        $this->question_8_d_i = $this->checklist_form->question_8_d_i;
        $this->question_8_d_ii = $this->checklist_form->question_8_d_ii;
        $this->question_8_d_iii = $this->checklist_form->question_8_d_iii;
        $this->question_9 = $this->checklist_form->question_9;
        $this->question_10 = $this->checklist_form->question_10;
        $this->question_11 = $this->checklist_form->question_11;
    }


    public $filePath1 = null;
    public $filePath2 = null;
    public $filePath3 = null;
    public function updateChecklistForm()
    {
        $this->validate();

        if ($this->file1) {
            $this->filePath1 = $this->file1->store('uploads', 'public');
        } else {
            $this->filePath1 = $this->checklist_form->file1;
        }



        if ($this->file2) {
            $this->filePath2 = $this->file2->store('uploads', 'public');
        } else {
            $this->filePath2 = $this->checklist_form->file2;
        }

        if ($this->file3) {
            $this->filePath3 = $this->file3->store('uploads', 'public');
        } else {
            $this->filePath3 = $this->checklist_form->file3;
        }

        try {
            $this->checklist_form->update([
                'attach_parental'  => $this->attach_parental,
                'debriefing' => $this->debriefing,
                'tools' => $this->tools,
                'tools_text' => $this->tools_text,
                'permission' => $this->permission,
                'file1' =>  $this->filePath1,
                'file2' =>  $this->filePath2,
                'file3' =>  $this->filePath3,
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

    public function deleteChecklistForm()
    {
        $this->checklist_form->delete();
        Session::flash('success', 'Your form has been deleted successfully.');
        $this->dispatch('showMessageModal');
    }

    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }



    public $pageName = "ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST";
    public function render()
    {
        return view('livewire.app.show.checklist-form');
    }
}
