<?php

namespace App\Livewire;


use App\Models\AppStatus;
use App\Models\Forms;
use App\Models\Form1 as ModelsForm1;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


#[Layout('layout.app')]
class ApplicationForm extends Component
{

    #[Rule('required|string')]
    public $title_of_study = '';

    #[Rule('required')]
    public $type_of_study = '';

    #[Rule('required_if:type_of_study,other')]
    public $type_of_study_other = '';

    public function showOtherInput()
    {
        if ($this->type_of_study !== "other") {
            $this->type_of_study_other = '';
        }
    }

    #[Rule('required|string')]
    public $researcher_name = '';
    #[Rule('required|string')]
    public $researcher_department = '';
    #[Rule('required|string')]
    public $researcher_institution = '';
    #[Rule('required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/')]
    public $researcher_phone = '';
    #[Rule('required|string')]
    public $researcher_address = '';
    #[Rule('required|email')]
    public $researcher_email = '';




    // public $other_researchers = [];
    // public function addResInput()
    // {
    //     $this->other_researchers[] = ['name' => '', 'institute' => ''];
    // }

    // public function removeResInput($index)
    // {
    //     unset($this->other_researchers[$index]);
    //     $this->other_researchers = array_values($this->other_researchers);
    // }

    public $question_5 = true;

    public function showQuestion5()
    {
        if ($this->type_of_study !== 'Academic Staff Study')
            $this->question_5 = true;
        else
            $this->question_5 = false;
    }

    #[Rule('required_unless:type_of_study,Academic Staff Study')]
    public $advisor_title = '';
    #[Rule('required_unless:type_of_study,Academic Staff Study|string')]
    public $advisor_name = '';
    #[Rule('required_unless:type_of_study,Academic Staff Study|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/')]
    public $advisor_phone = '';
    #[Rule('required_unless:type_of_study,Academic Staff Study|string')]
    public $advisor_department = '';
    #[Rule('required_unless:type_of_study,Academic Staff Study|string')]
    public $advisor_address = '';
    #[Rule('required_unless:type_of_study,Academic Staff Study|email')]
    public $advisor_email = '';



    #[Rule('required|date|after:today')]
    public $expected_start = '';
    #[Rule('required|date|after:expected_start')]
    public $expected_end = '';

    // public $organizations = [];

    // public function addOrgInput()
    // {
    //     $this->organizations[] = [''];
    // }

    // public function removeInputOrg($index)
    // {
    //     unset($this->organizations[$index]);
    //     $this->organizations = array_values($this->organizations);
    // }

    #[Rule('required')]
    public $question_8 = '';

    #[Rule('required_if:question_8,yes')]
    public $question_8_1 = '';

    public function showOtherInput1()
    {

        if ($this->question_8 === 'no') {
            $this->question_8_1 = '';
        }
    }

    #[Rule('required')]
    public $question_9 = '';

    #[Rule('required')]
    public $question_9_1 = '';

    #[Rule('required_if:question_9_1,international,other')]
    public $question_9_2 = '';

    #[Rule('required')]
    public $question_9_3 = '';

    #[Rule('required_if:question_9_3,yes')]
    public $question_9_4 = '';

    public function showOtherInput2()
    {
        if ($this->question_9_1 == 'University' || $this->question_9_1 == 'TUBITAK') {
            $this->question_9_2 = '';
            $this->question_9_3 = '';
        }
    }


    public function showOtherInput3()
    {

        if ($this->question_9_3 == 'no') {
            $this->question_9_4 = '';
        }
    }

    #[Rule('required')]
    public $status = '';

    #[Rule('required_if:status,Reporting Changes|string')]
    public $rp_protocol_no = '';
    #[Rule('required_if:status,Reporting Changes|string')]
    public $reporting_q_1 = '';
    #[Rule('required_if:status,Reporting Changes|string')]
    public $reporting_q_2 = '';
    #[Rule('required_if:reporting_q_2,yes')]
    public $reporting_q_2_1 = '';


    #[Rule('required_if:status,Extension of a Previous Study|string')]
    public $ex_protocol_no = '';

    #[Rule('required_if:status,Extension of a Previous Study')]
    public $extension_end_date = '';

    #[Rule('required_if:status,Extension of a Previous Study|string')]
    public $extension_q_1 = '';

    // values of radio buttons
    public $new_revised = false;
    public $extension = false;
    public $reporting = false;

    public function showFields()
    {
        if ($this->status == 'New') {
            $this->new_revised = true;
            $this->reporting = false;
            $this->extension = false;
            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
        }
        if ($this->status == 'Revised') {
            $this->new_revised = true;
            $this->reporting = false;
            $this->extension = false;
            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
        }
        if ($this->status == 'Reporting Changes') {
            $this->reporting = true;
            $this->new_revised = false;
            $this->extension = false;
            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14',
                'question_14_1',
                'question_15',
                'question_16',


                'question_18',
                'question_19',

                'question_21'

            );
        }
        if ($this->status == 'Extension of a Previous Study') {
            $this->extension = true;
            $this->new_revised = false;
            $this->reporting = false;
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14',
                'question_14_1',
                'question_15',
                'question_16',


                'question_18',
                'question_19',

                'question_21'

            );
        }
    }

    public function showRpChanges()
    {
        if ($this->extension_q_1 == 'yes') {
            $this->reporting = true;
        } else {
            $this->reporting = false;
        }
    }


    #[Rule('required_if:status,New,Revised|string')]
    public $question_11 = '';

    #[Rule('required_if:status,New,Revised|string')]
    public $question_12 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_13 = '';

    #[Rule('required')]
    public $question_14 = '';

    #[Rule('required_if:question_14,yes|string')]
    public $question_14_1 = '';

    #[Rule('required_if:status,New,Revised|numeric|between:0,20')]
    public $question_15 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_16 = '';


    #[Rule('required_if:status,New,Revised|string')]
    public $question_18 = '';

    #[Rule('required_if:status,New,Revised|string')]
    public $question_19 = '';


    #[Rule('required_if:status,New,Revised|string')]
    public $question_21 = '';

    #[Rule('required|string')]
    public $rname = '';
    #[Rule('required')]
    public $rdate = '';
    #[Rule('required|string')]
    public $sname = '';
    #[Rule('required')]
    public $sdate = '';


    // public $showModal = false;
    public function createForm1()
    {
        $this->validate();
        // try {


        // $app = AppStatus::create([
        //     'user_id' => auth()->user()->id,
        //     'form_type' => 1,
        //     'checklist_form_id' => null,
        //     'status' => 'New',
        //     'user_email' => auth()->user()->email
        // ]);

        // ModelsForm1::create([
        //     'user_id' => auth()->user()->id,
        //     'app_id' => $app->id,
        //     'title_of_study' => $this->title_of_study,
        //     'type_of_study' => json_encode($this->type_of_study),
        //     'researchers' => json_encode($this->researcher),
        //     'other_researchers' => json_encode($this->other_researchers),
        //     'advisors' => json_encode($this->advisor),
        //     'expected_time_frame' => json_encode($this->time_frame),
        //     'org_inst' => json_encode($this->organizations),
        //     'question_8' => json_encode($this->question_8),
        //     'question_9_1' => $this->question_9_1,
        //     'question_9_2' => json_encode($this->question_9_2),
        //     'question_9_3' => json_encode($this->question_9_3),
        //     'status' => $this->status,
        //     'reporting_changes' => json_encode($this->reporting_changes),
        //     'extension_pr_study' => json_encode($this->extension_pr_study),
        //     'question_11' => $this->question_11,
        //     'question_12' => $this->question_12,
        //     'question_13' => $this->question_13,
        //     'question_14' => json_encode($this->question_14),
        //     'question_15' => $this->question_15,
        //     'question_16' => $this->question_16,
        //     'question_17' => json_encode($this->question_17),
        //     'question_17_1' => $this->question_17_1,
        //     'question_17_2' => $this->question_17_2,
        //     'question_18' => $this->question_18,
        //     'question_19' => $this->question_19,
        //     'question_20' => json_encode($this->question_20),
        //     'question_21' => $this->question_21,
        //     'rname' => $this->rname,
        //     'rdate' => $this->rdate,
        //     'sname' => $this->sname,
        //     'sdate' => $this->sdate
        // ]);
        // Session::flash('success', 'Your form has been updated successfully.');
        // } catch (QueryException $e) {

        // Log::error("SQL Error: " . $e->getMessage());
        // Session::flash('error', 'An error occurred while saving the form. Please try again.');
        // }
        //     $this->dispatch('showModal');
        // }

        // public function redirectUserDashboard()
        // {
        //     return redirect('user-dashboard');
    }



    public $pageName = "Ethics Committee Application Form";
    public function render()
    {
        return view('livewire.app.application-form');
    }
}
