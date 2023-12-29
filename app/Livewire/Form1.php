<?php

namespace App\Livewire;

use App\Livewire\AppStatus as LivewireAppStatus;
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
class Form1 extends Component
{

    #[Rule('required|string')]
    public $title_of_study = '';

    public $type_of_study = ['value' => '', 'other' => ''];

    public function showOtherInput()
    {
        if ($this->type_of_study['value'] !== "other") {
            $this->type_of_study['other'] = '';
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




    public $other_researchers = [];
    public function addResInput()
    {
        $this->other_researchers[] = ['name' => '', 'institute' => ''];
    }

    public function removeResInput($index)
    {
        unset($this->other_researchers[$index]);
        $this->other_researchers = array_values($this->other_researchers);
    }

    public $question_5 = true;

    public function showQuestion5()
    {
        if ($this->type_of_study['value'] !== 'Academic Staff Study')
            $this->question_5 = true;
        else
            $this->question_5 = false;
    }

    #[Rule('required_unless:type_of_study.value,Academic Staff Study')]
    public $advisor_title = '';
    #[Rule('required_unless:type_of_study.value,Academic Staff Study|string')]
    public $advisor_name = '';
    #[Rule('required_unless:type_of_study.value,Academic Staff Study|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/')]
    public $advisor_phone = '';
    #[Rule('required_unless:type_of_study.value,Academic Staff Study|string')]
    public $advisor_department = '';
    #[Rule('required_unless:type_of_study.value,Academic Staff Study|string')]
    public $advisor_address = '';
    #[Rule('required_unless:type_of_study.value,Academic Staff Study|email')]
    public $advisor_email = '';



    #[Rule('required|date|after:today')]
    public $expected_start = '';
    #[Rule('required|date|after:expected_start')]
    public $expected_end = '';

    public $organizations = [];

    public function addOrgInput()
    {
        $this->organizations[] = [''];
    }

    public function removeInputOrg($index)
    {
        unset($this->organizations[$index]);
        $this->organizations = array_values($this->organizations);
    }


    public $question_8 = ['value' => '', 'data' => ''];

    public function showOtherInput1()
    {
        // Reset otherData1 when switching from "Yes" to "No"
        if ($this->question_8['value'] == 'no') {
            $this->question_8['data'] = '';
        }
    }


    #[Rule('required')]
    public $question_9_1 = '';

    public $question_9_2 = ['value' => '', 'international' => '', 'other' => ''];

    public function showOtherInput2()
    {
        // Reset otherData1 when switching from "Yes" to "No"
        if ($this->question_9_2['value'] == 'University' || $this->question_9_2['value'] == 'TUBITAK') {
            $this->question_9_2['data'] = '';
        }
    }


    public $question_9_3 = ['value' => '', 'data' => ''];

    public function showOtherInput3()
    {
        // Reset otherData1 when switching from "Yes" to "No"
        if ($this->question_9_3['value'] == 'no') {
            $this->question_9_3['data'] = '';
        }
    }

    #[Rule('required')]
    public $status = '';

    public $extension_pr_study = ['protocol_no' => '', 'expected_date' => '', 'any_difference' => ''];

    public $reporting_changes = ['protocol_no' => '', 'text1' => '', 'option' => '', 'text2' => ''];

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
            $this->reset('extension_pr_study.protocol_no', 'extension_pr_study.expected_date', 'extension_pr_study.any_difference');
            $this->reset('reporting_changes.protocol_no', 'reporting_changes.text1', 'reporting_changes.option', 'reporting_changes.text2');
        }
        if ($this->status == 'Revised') {
            $this->new_revised = true;
            $this->reporting = false;
            $this->extension = false;
            $this->reset('extension_pr_study.protocol_no', 'extension_pr_study.expected_date', 'extension_pr_study.any_difference');
            $this->reset('reporting_changes.protocol_no', 'reporting_changes.text1', 'reporting_changes.option', 'reporting_changes.text2');
        }
        if ($this->status == 'Reporting Changes') {
            $this->reporting = true;
            $this->new_revised = false;
            $this->extension = false;
            $this->reset('extension_pr_study.protocol_no', 'extension_pr_study.expected_date', 'extension_pr_study.any_difference');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14.value',
                'question_14.data',
                'question_15',
                'question_16',
                'question_17.types',
                'question_17.other',
                'question_17_1',
                'question_17_2',
                'question_18',
                'question_19',
                'question_20.types',
                'question_20.other',
                'question_21'

            );
        }
        if ($this->status == 'Extension of a Previous Study') {
            $this->extension = true;
            $this->new_revised = false;
            $this->reporting = false;
            $this->reset('reporting_changes.protocol_no', 'reporting_changes.text1', 'reporting_changes.option', 'reporting_changes.text2');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14.value',
                'question_14.data',
                'question_15',
                'question_16',
                'question_17.types',
                'question_17.other',
                'question_17_1',
                'question_17_2',
                'question_18',
                'question_19',
                'question_20.types',
                'question_20.other',
                'question_21'

            );
        }
    }





    public function showRpChanges()
    {
        if ($this->extension_pr_study['any_difference'] == 'yes') {
            $this->reporting = true;
        } else {
            $this->reporting = false;
        }
    }

    protected $rules = [
        'type_of_study.value' => 'required',
        'type_of_study.other' => 'required_if:type_of_study.value,other',
        'question_8.value' => 'required',
        'question_8.data' => 'required_if:question_8.value,yes',
        'question_9_2.value' => 'required',
        'question_9_2.international' => 'required_if:question_9_2.value,international',
        'question_9_2.other' => 'required_if:question_9_2.value,other',
        'question_9_3.value' => 'required',
        'question_9_3.data' => 'required_if:question_9_3.value,yes',
        'extension_pr_study.protocol_no' => 'required_if:status,Extension of a Previous Study|string',
        'extension_pr_study.expected_date' => 'required_if:status,Extension of a Previous Study',
        'extension_pr_study.any_difference' => 'required_if:status,Extension of a Previous Study|string',
        'reporting_changes.protocol_no' => 'required_if:status,Reporting Changes|string',
        'reporting_changes.text1' => 'required_if:status,Reporting Changes|string',
        'reporting_changes.option' => 'required_if:status,Reporting Changes',
        'reporting_changes.text2' => 'required_if:reporting_changes.option,yes',
        'question_14.value' => 'required_if:status,New,Revised',
        'question_14.data' => 'required_if:question_14.value,yes|string',
        'question_17.types' => 'required_if:status,New,Revised',
        'question_20.types' => 'required_if:status,New,Revised',


    ];


    #[Rule('required_if:status,New,Revised|string')]
    public $question_11 = '';

    #[Rule('required_if:status,New,Revised|string')]
    public $question_12 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_13 = '';


    public $question_14 = ['value' => '', 'data' => ''];

    #[Rule('required_if:status,New,Revised|numeric|between:0,20')]
    public $question_15 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_16 = '';


    public $question_17 = ['types' => [], 'other' => ''];

    #[Rule('required_if:status,New,Revised')]
    public $question_17_1 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_17_2 = '';


    #[Rule('required_if:status,New,Revised|string')]
    public $question_18 = '';

    #[Rule('required_if:status,New,Revised|string')]
    public $question_19 = '';


    public $question_20 = ['types' => [], 'other' => ''];

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

    public $researcher;
    public $advisor;
    public $time_frame;

    public $showModal = false;
    public function createForm1()
    {
        $this->validate();


        $this->researcher = [
            'name' => $this->researcher_name,
            'department' => $this->researcher_department,
            'institution' => $this->researcher_institution,
            'phone' => $this->researcher_phone,
            'address' => $this->researcher_address,
            'email' => $this->researcher_email
        ];



        $this->advisor = [
            'title' => $this->advisor_title,
            'name' => $this->advisor_name,
            'phone' => $this->advisor_phone,
            'department' => $this->advisor_department,
            'address' => $this->advisor_address,
            'email' => $this->advisor_email
        ];

        $this->time_frame = [
            'start' => $this->expected_start,
            'end' => $this->expected_end
        ];

        try {


            $app = AppStatus::create([
                'user_id' => auth()->user()->id,
                'form_type' => 1,
                'checklist_form_id' => null,
                'status' => 'New',
                'user_email' => auth()->user()->email
            ]);

            ModelsForm1::create([
                'user_id' => auth()->user()->id,
                'app_id' => $app->id,
                'title_of_study' => $this->title_of_study,
                'type_of_study' => json_encode($this->type_of_study),
                'researchers' => json_encode($this->researcher),
                'other_researchers' => json_encode($this->other_researchers),
                'advisors' => json_encode($this->advisor),
                'expected_time_frame' => json_encode($this->time_frame),
                'org_inst' => json_encode($this->organizations),
                'question_8' => json_encode($this->question_8),
                'question_9_1' => $this->question_9_1,
                'question_9_2' => json_encode($this->question_9_2),
                'question_9_3' => json_encode($this->question_9_3),
                'status' => $this->status,
                'reporting_changes' => json_encode($this->reporting_changes),
                'extension_pr_study' => json_encode($this->extension_pr_study),
                'question_11' => $this->question_11,
                'question_12' => $this->question_12,
                'question_13' => $this->question_13,
                'question_14' => json_encode($this->question_14),
                'question_15' => $this->question_15,
                'question_16' => $this->question_16,
                'question_17' => json_encode($this->question_17),
                'question_17_1' => $this->question_17_1,
                'question_17_2' => $this->question_17_2,
                'question_18' => $this->question_18,
                'question_19' => $this->question_19,
                'question_20' => json_encode($this->question_20),
                'question_21' => $this->question_21,
                'rname' => $this->rname,
                'rdate' => $this->rdate,
                'sname' => $this->sname,
                'sdate' => $this->sdate
            ]);
            Session::flash('success', 'Your form has been updated successfully.');
        } catch (QueryException $e) {

            Log::error("SQL Error: " . $e->getMessage());
            Session::flash('error', 'An error occurred while saving the form. Please try again.');
        }
        $this->dispatch('showModal');
    }

    public function redirectUserDashboard()
    {
        return redirect('user-dashboard');
    }



    public $pageName = "Ethics Committee Application Form";
    public function render()
    {
        return view('livewire.app.form1');
    }
}
