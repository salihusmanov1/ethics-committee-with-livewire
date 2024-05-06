<?php

namespace App\Livewire;

use App\Models\AppStatus;
use App\Models\Method;
use App\Models\Participants;
use App\Models\Form1;
use App\Models\Other_researchers;
use App\Models\Organization;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
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
    public $question_5 = true;
    public $question_s = true; // extra
    public function showOtherInput()
    {
        if ($this->type_of_study !== "other") {
            $this->type_of_study_other = '';
        }
        if ($this->type_of_study !== 'Academic Staff Study') {
            $this->question_5 = true;
            $this->question_s = true; //extra
        } else {
            $this->question_5 = false;
            $this->question_s = false; //extra
            $this->reset('advisor_title', 'advisor_name', 'advisor_phone', 'advisor_department', 'advisor_address', 'advisor_email');
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




    public $expected_start = '';
    public $expected_end = '';

    protected function rules()
    {
        return [
            'expected_start' => ['required', 'date'],
            'expected_end' => ['required', 'date', 'after_or_equal:expected_start'],

        ];
    }

    public function messages()
    {
        return [
            'expected_end.after_or_equal' => 'The :attribute must be a date after the expected start date.',
        ];
    }

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

    public function showOtherInput1()
    {

        if ($this->question_8 === 'no') {
            $this->question_8_1 = '';
        }
    }
    #[Rule('required')]
    public $question_9 = '';

    #[Rule('required_if:question_9,Supported')]
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

    public function showOtherInput4()
    {

        if ($this->question_14 == 'no') {
            $this->question_14_1 = '';
        }
    }

    #[Rule('required_if:status,New,Revised')]
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

    public $question_20_other = false;

    public function showOtherInput5()
    {
        $this->question_20_other = !$this->question_20_other;
        if (!$this->question_20_other)
            $this->question_20["other"] = '';
    }

    public $question_17_other = false;

    public function showOtherInput6()
    {
        $this->question_17_other = !$this->question_17_other;
        if (!$this->question_17_other)
            $this->question_17["other"] = '';
    }


    // #[Rule('required_if:status,New,Revised')]
    public $question_17_1 = '';

    // #[Rule('required_if:status,New,Revised')]
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
    public $select_status;

    public function mount($formId)
    {

        $this->data = AppStatus::where('id', $formId)->first();
        $this->form = Form1::where('app_id', $formId)->first();
        $this->other_res = Other_researchers::where('app_form_id', $this->form->id)->get()->toArray();
        $this->org = Organization::where('app_form_id', $this->form->id)->get()->pluck('organization')->toArray();
        $this->participants = Participants::where('app_form_id', $this->form->id)->get()->pluck('type')->toArray();
        $this->methods = Method::where('app_form_id', $this->form->id)->pluck('method')->toArray();
        $this->select_status = $this->data->status;

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

        $this->ex_protocol_no = $this->form->ex_protocol_no;
        $this->extension_q_1 = $this->form->extension_q_1;
        $this->extension_end_date = $this->form->extension_end_date;

        $this->rp_protocol_no = $this->form->rp_protocol_no;
        $this->reporting_q_1 = $this->form->reporting_q_1;
        $this->reporting_q_2 = $this->form->reporting_q_2;
        $this->reporting_q_2_1 = $this->form->reporting_q_2_1;

        $this->question_11 = $this->form->question_11;
        $this->question_12 = $this->form->question_12;
        $this->question_13 = $this->form->question_13;
        $this->question_14 = $this->form->question_14;
        $this->question_14_1 = $this->form->question_14_1;
        $this->question_15 = $this->form->question_15;
        $this->question_16 = $this->form->question_16;
        $this->question_17_1 = $this->form->question_17_1;
        $this->question_17_2 = $this->form->question_17_2;
        $this->question_18 = $this->form->question_18;
        $this->question_19 = $this->form->question_19;
        $this->question_21 = $this->form->question_21;
        $this->sname = $this->form->sname;
        $this->sdate = $this->form->sdate;
        $this->rname = $this->form->rname;
        $this->rdate = $this->form->rdate;

        foreach ($this->participants as $key => $value) {
            if (array_key_exists($value, $this->question_17['types'])) {
                $this->question_17['types'][$value] = true;
            } else {
                $this->question_17['other'] = $value;
            }
        }

        foreach ($this->methods as $key => $value) {
            if (array_key_exists($value, $this->question_20['types'])) {
                $this->question_20['types'][$value] = true;
            } else {
                $this->question_20['other'] = $value;
            }
        }

        if ($this->question_17["other"]) {
            $this->question_17_other = true;
        }

        if ($this->question_20["other"]) {
            $this->question_20_other = true;
        }
    }

    public $existingMethods;
    public $existingParticipants;
    public $existingOrganizations;
    public $existingOtherResearchers;

    public function updateStatus()
    {
        $this->data->update([
            'status' => $this->select_status
        ]);
        Session::flash('success', 'The application has been updated successfully.');
        $this->dispatch('showModal');
    }

    public function updateForm1()
    {


        $this->validate();

        try {

            $extensionEndDate = $this->extension_end_date;
            if (empty($extensionEndDate)) {
                $extensionEndDate = null; // Set it to NULL
            }
            $question_15 = $this->question_15;
            if (empty($question_15)) {
                $question_15 = null; // Set it to NULL
            }
            $this->form->update([
                'title_of_study' => $this->title_of_study,
                'type_of_study' => $this->type_of_study,
                'type_of_study_other' => $this->type_of_study_other,
                'r_full_name' => $this->researcher_name,
                'r_department' => $this->researcher_department,
                'r_institute' => $this->researcher_institution,
                'r_phone_no' => $this->researcher_phone,
                'r_address' => $this->researcher_address,
                'r_email' => $this->researcher_email,
                'a_title' => $this->advisor_title,
                'a_full_name' => $this->advisor_name,
                'a_department' => $this->advisor_department,
                'a_phone_no' => $this->advisor_phone,
                'a_address' => $this->advisor_address,
                'a_email' => $this->advisor_email,
                'start_date' => $this->expected_start,
                'end_date' => $this->expected_end,
                'question_8' => $this->question_8,
                'question_8_1' => $this->question_8_1,
                'question_9' => $this->question_9,
                'question_9_1' => $this->question_9_1,
                'question_9_2' => $this->question_9_2,
                'question_9_3' => $this->question_9_3,
                'question_9_4' => $this->question_9_4,
                'application_status' => $this->status,
                'question_11' => $this->question_11,
                'question_12' => $this->question_12,
                'question_13' => $this->question_13,
                'question_14' => $this->question_14,
                'question_14_1' => $this->question_14_1,
                'question_15' => $question_15,
                'question_16' => $this->question_16,
                'question_17_1' => $this->question_17_1,
                'question_17_2' => $this->question_17_2,
                'question_18' => $this->question_18,
                'question_19' => $this->question_19,
                'question_21' => $this->question_21,
                'rp_protocol_no' => $this->rp_protocol_no,
                'reporting_q_1' => $this->reporting_q_1,
                'reporting_q_2' => $this->reporting_q_2,
                'reporting_q_2_1' => $this->reporting_q_2_1,
                'ex_protocol_no' => $this->ex_protocol_no,
                'extension_end_date' => $extensionEndDate,
                'extension_q_1' => $this->extension_q_1,
                'rname' => $this->rname,
                'rdate' => $this->rdate,
                'sname' => $this->sname,
                'sdate' => $this->sdate

            ]);

            if ($this->form->consentForm) {
                $this->form->consentForm->update([
                    'r_full_name' => $this->researcher_name,
                    'institue' => $this->researcher_institution,
                    'title' => $this->title_of_study,
                    'email' => $this->researcher_email,
                    'phone_no' => $this->researcher_phone
                ]);
            }


            $form1Id = $this->form->id;

            $this->existingMethods = Method::where('app_form_id', $form1Id)->get();
            foreach ($this->existingMethods as $existingMethod) {
                $existingMethod->delete();
            }

            $this->existingParticipants = Participants::where('app_form_id', $form1Id)->get();
            foreach ($this->existingParticipants as $existingParticipant) {
                $existingParticipant->delete();
            }
            $this->existingOrganizations = Organization::where('app_form_id', $form1Id)->get();
            foreach ($this->existingOrganizations as $existingOrganization) {
                $existingOrganization->delete();
            }

            $this->existingOtherResearchers = Other_researchers::where('app_form_id', $form1Id)->get();
            foreach ($this->existingOtherResearchers as $existingOtherResearcher) {
                $existingOtherResearcher->delete();
            }


            foreach ($this->question_20['types'] as $type => $isChecked) {
                if ($isChecked) {
                    $method = new Method([
                        'method' => $type,
                        'app_form_id' => $form1Id,
                    ]);

                    $method->save();
                }
            }

            if (!empty($this->question_20['other'])) {
                $method = new Method([
                    'method' => $this->question_20['other'],
                    'app_form_id' => $form1Id,
                ]);

                $method->save();
            }


            foreach ($this->question_17['types'] as $type => $isChecked) {
                if ($isChecked) {
                    $participant = new Participants([
                        'type' => $type,
                        'app_form_id' => $form1Id,
                    ]);


                    $participant->save();
                }
            }
            if (!empty($this->question_17['other'])) {
                $participant = new Participants([
                    'type' => $this->question_17['other'],
                    'app_form_id' => $form1Id,
                ]);

                $participant->save();
            }


            foreach ($this->other_researchers as $researcher) {
                $other_researchers = new Other_researchers([
                    'full_name' => $researcher['full_name'],
                    'institute' => $researcher['institute'],
                    'app_form_id' => $form1Id,
                ]);
                $other_researchers->save();
            }

            foreach ($this->organizations as $organization) {
                $organizations = new Organization([
                    'organization' => $organization,
                    'app_form_id' => $form1Id,
                ]);
                $organizations->save();
            }
            Session::flash('success', 'Your form has been updated successfully.');
        } catch (QueryException $e) {

            Log::error("SQL Error: " . $e->getMessage());
            Session::flash('error', 'An error occurred while saving the form. Please try again.');
        }
        $this->dispatch('showModal');
    }

    public function deleteForm1()
    {
        $this->form->delete();
        $this->data->delete();
        Session::flash('success', 'Your form has been deleted successfully.');
        $this->dispatch('showModal');
    }

    public function redirectToDashboard()
    {
        return redirect()->route('user-dashboard');
    }



    public $pageName = "Ethics Committee Application Form";
    public function render()
    {
        return view('livewire.app.show.application-form');
    }
}
