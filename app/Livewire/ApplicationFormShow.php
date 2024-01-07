<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\Forms;
use App\Models\Method;
use App\Models\Participants;
use App\Models\Form1;
use App\Models\Other_researchers;
use App\Models\Organization;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

#[Layout('layout.app')]
class ApplicationFormShow extends Component
{
    public $readonlyInputs = true;
    public function enableEdit()
    {
        $this->readonlyInputs = !$this->readonlyInputs;
    }

    #[Rule('required|string')]
    public $title_of_study = '';

    #[Rule('required')]
    public $type_of_study = '';

    #[Rule('required_if:type_of_study,other')]
    public $type_of_study_other = '';


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
        $this->other_researchers[] = ['full_name' => '', 'institute' => ''];
    }

    public function removeResInput($index)
    {
        unset($this->other_researchers[$index]);
        $this->other_researchers = array_values($this->other_researchers);
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

    public $organizations = [];

    public function addOrgInput()
    {
        $this->organizations[] = '';
    }

    public function removeInputOrg($index)
    {
        unset($this->organizations[$index]);
        $this->organizations = array_values($this->organizations);
    }

    #[Rule('required')]
    public $question_8 = '';

    #[Rule('required_if:question_8,yes')]
    public $question_8_1 = '';


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
   
    public function showFields()
    {
        if ($this->status == 'New') {

            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
        }
        if ($this->status == 'Revised') {
            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
        }
        if ($this->status == 'Reporting Changes') {
            $this->reset('ex_protocol_no', 'extension_end_date', 'extension_q_1');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14',
                'question_14_1',
                'question_15',
                'question_16',
                'question_17',
                'question_18',
                'question_19',
                'question_20',
                'question_21'
            );
        }
        if ($this->status == 'Extension of a Previous Study') {
            $this->reset('rp_protocol_no', 'reporting_q_1', 'reporting_q_2', 'reporting_q_2_1');
            $this->reset(
                'question_11',
                'question_12',
                'question_13',
                'question_14',
                'question_14_1',
                'question_15',
                'question_16',
                'question_17',
                'question_18',
                'question_19',
                'question_20',
                'question_21'

            );
        }
    }



    #[Rule('required_if:status,New,Revised|string')]
    public $question_11 = '';

    #[Rule('required_if:status,New,Revised|string')]
    public $question_12 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_13 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_14 = '';

    #[Rule('required_if:question_14,yes|string')]
    public $question_14_1 = '';

    #[Rule('required_if:status,New,Revised|numeric|between:0,20')]
    public $question_15 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_16 = '';

    public $question_20 = [
        'types' => [
            'Survey' => false,
            'Interview' => false,
            'Observation' => false,
            'ComputerTest' => false,
            'VideoFilmRecording' => false,
            'VoiceRecording' => false,
            'PhysiologicalMeasurement' => false,
            'BiologicalSample' => false,
            'MakingParticipantsUseSubstance' => false,
            'ExposureToHighSimulation' => false,
        ],
        'other' => '',
    ];

    public $question_17 = [
        'types' => [
            'UniversityStudents' => false,
            'AdultsInEmployment' => false,
            'UnemployedAdults' => false,
            'PreschoolChildren' => false,
            'MentallyDisabledChallengedIndividuals' => false,
            'PhysicallyDisabledChallengedIndividuals' => false,
            'HighschoolStudents' => false,
            'PrimarySchoolPupils' => false,
            'ChildWorkers' => false,
            'TheElderly' => false,
            'Prisoners' => false,
        ],
        'other' => '',
    ];


    #[Rule('required_if:status,New,Revised')]
    public $question_17_1 = '';

    #[Rule('required_if:status,New,Revised')]
    public $question_17_2 = '';


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


    public $data;
    public $form;
    public $other_res;
    public $org;
    public $participants;
    public $methods;

    // public $participants_list = [
    //     'UniversityStudents',
    //     'AdultsInEmployment',
    //     'UnemployedAdults',
    //     'PreschoolChildren',
    //     'MentallyDisabledChallengedIndividuals',
    //     'PhysicallyDisabledChallengedIndividuals',
    //     'HighschoolStudents',
    //     'PrimarySchoolPupils',
    //     'ChildWorkers',
    //     'TheElderly',
    //     'Prisoners'
    // ];

    // public $methods_list = [
    //     'Survey',
    //     'Interview',
    //     'Observation',
    //     'ComputerTest',
    //     'VideoFilmRecording',
    //     'VoiceRecording',
    //     'PhysiologicalMeasurement',
    //     'BiologicalSample',
    //     'MakingParticipantsUseSubstance',
    //     'ExposureToHighSimulation'
    // ];

    public $methods_other;
    public $participants_other;


    public function mount($formId)
    {

        $this->data = AppStatus::where('id', $formId)->first();
        $this->form = Form1::where('app_id', $formId)->first();
        $this->other_res = Other_researchers::where('app_form_id', $this->form->id)->get()->toArray();
        $this->org = Organization::where('app_form_id', $this->form->id)->get()->pluck('organization')->toArray();
        $this->participants = Participants::where('app_form_id', $this->form->id)->get()->pluck('type')->toArray();
        $this->methods = Method::where('app_form_id', $this->form->id)->pluck('method')->toArray();

        // $this->participants_other = array_diff($this->participants, $this->participants_list);
        // $this->methods_other = array_diff($this->methods, $this->methods_list);


        $this->title_of_study = $this->form->title_of_study;
        $this->type_of_study = $this->form->type_of_study;
        $this->type_of_study_other = $this->form->type_of_study_other;
        $this->researcher_name = $this->form->r_full_name;
        $this->researcher_department = $this->form->r_department;
        $this->researcher_institution = $this->form->r_institute;
        $this->researcher_email = $this->form->r_email;
        $this->researcher_phone = $this->form->r_phone_no;
        $this->researcher_address = $this->form->r_address;

        $this->other_researchers = $this->other_res;

        $this->advisor_title = $this->form->a_title;
        $this->advisor_name = $this->form->a_full_name;
        $this->advisor_phone = $this->form->a_phone_no;
        $this->advisor_email = $this->form->a_email;
        $this->advisor_department = $this->form->a_department;
        $this->advisor_address = $this->form->a_address;

        $this->expected_start = $this->form->start_date;
        $this->expected_end = $this->form->end_date;

        $this->organizations = $this->org;
      
        $this->question_8 = $this->form->question_8;
        $this->question_8_1 = $this->form->question_8_1;

        $this->question_9 = $this->form->question_9;
        $this->question_9_1 = $this->form->question_9_1;
        $this->question_9_2 = $this->form->question_9_2;
        $this->question_9_3 = $this->form->question_9_3;
        $this->question_9_4 = $this->form->question_9_4;

        $this->status = $this->form->application_status;

        $this->question_11 = $this->form->question_11;
        $this->question_12 = $this->form->question_12;
        $this->question_13 = $this->form->question_13;
        $this->question_14 = $this->form->question_14;
        $this->question_14_1 = $this->form->question_14_1;
        $this->question_15 = $this->form->question_15;
        $this->question_16 = $this->form->question_16;

        foreach ($this->participants as $key => $value) {
            if (array_key_exists($value, $this->question_17['types'])) {
                $this->question_17['types'][$value] = true;
            }
            else {
                // $this->question_17['other'] = 
            }
        }
        // dd($this->question_17);
    }

    public $pageName = "Ethics Committee Application Form";
    public function render()
    {
        return view('livewire.app.show.application-form');
    }
}
