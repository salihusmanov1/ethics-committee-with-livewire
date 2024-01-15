<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)


    <div class="container form-container">


        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
            </div>
            <form wire:submit='updateForm1' action="" class="main">
                <div>
                    <div class="row">
                        <div class="col" style="font-size: 16px; font-weight: bold;">
                            @if ($form->ConsentForm)
                                <p><a class="link-opacity-50"
                                        href="{{ url('/show/information-consent-form/' . $form->ConsentForm->id) }}"><i
                                            class="fa-regular fa-file-lines"></i> &nbspAttached Informed Consent
                                        Form</a>
                                </p>
                            @endif
                            @if ($data->Checklist)
                                <p><a class="link-opacity-50"
                                        href="{{ url('/show/checklist/' . $data->Checklist->id) }}"><i
                                            class="fa-regular fa-file-lines"></i> &nbspAttached Checklist Form</a>
                                </p>
                            @endif
                            <p style="font-size: 24px">№{{ $data->id }}</p >
                        </div>
                    

                        <div style="width: 100%" class="col d-flex justify-content-end">
                            @if (auth()->user()->role_id == 0)
                            <label class="form-label" style="margin-right: 10px">Status:</label>
                                <div class="col">
                                   
                                    <select wire:model.live='select_status' class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="New"> New
                                        </option>
                                        <option value="Pending">
                                            Pending</option>
                                        <option value="Approved">
                                            Approved</option>
                                        <option value="Rejected">
                                            Rejected</option>
                                    </select>
                                </div>
                                <div><button style="margin-left: 10px" type="submit"
                                    class="btn btn-secondary">Save</button>
                            </div>
                            @endif
                            @if (auth()->user()->role_id == 1)
                                <div><button style="margin-left: 10px" wire:click="enableEdit" type="button"
                                        class="btn btn-primary">Update</button></div>

                                <div><button style="margin-left: 10px" type="submit"
                                        class="btn btn-secondary">Save</button>
                                </div>
                            @endif
                            <div>
                                <button id="deleteBtn" style="margin-left: 10px" type="button"
                                    class="btn btn-danger">Delete</button>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <img style="width: 15%" src="\img\logo6.png" alt="">
                </div>
                <h3>ETHICS COMMITTEE APPLICATION FORM</h3>
                <!-- 1 -->
                <div class="mb-3 row" id="section-1">
                    <div class="col">
                        <label class="form-label">1. Title Of Study</label>
                        <input wire:model.live="title_of_study" type="text" class="form-control" placeholder=""
                            @readonly($readonlyInputs)>
                        @error('title_of_study')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- 2 -->
                <div class="mb-3 row" id="section-2">
                    <label class="form-label">2. Type Of Study</label>
                    <div class="form-check">
                        <input wire:click="showOtherInput" class="form-check-input" id="acRadio" type="radio"
                            wire:model.live="type_of_study" value="Academic Staff Study" @disabled($readonlyInputs)>
                        <label class="form-label-small">
                            Academic Staff Study
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click="showOtherInput" class="form-check-input" type="radio"
                            wire:model.live="type_of_study" value="Doctorate Thesis" @disabled($readonlyInputs)>
                        <label class="form-label-small">
                            Doctorate Thesis
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click="showOtherInput" class="form-check-input" type="radio"
                            wire:model.live="type_of_study" value="Master Thesis" @disabled($readonlyInputs)>
                        <label class="form-label-small">
                            Master Thesis
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click="showOtherInput" class="form-check-input"
                            type="radio"wire:model.live="type_of_study" value="other" @disabled($readonlyInputs)>
                        <label class="form-label-small">
                            Other (Specify):
                        </label>
                    </div>
                    @if ($type_of_study === 'other')
                        <div class="col">
                            <input wire:model.live="type_of_study_other" value="" type="text"
                                class="form-control" @readonly($readonlyInputs)>
                            @error('type_of_study_other')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    @endif
                    @error('type_of_study')
                        <span class="text-danger">This input field is required!</span></br>
                    @enderror
                </div>

                <!-- 3 -->
                <div class="mb-3 row" id="section-3">
                    <label class="form-label">3. Researcher's</label>
                    <div class="col">
                        <label class="form-label-small headers">Name and surname:</label>
                        <input wire:model.live='researcher_name' type="text" class="form-control" @readonly($readonlyInputs)>
                        @error('researcher_name')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                        <label class="form-label-small headers">Department:</label>
                        <input wire:model.live='researcher_department' type="text" class="form-control"
                            @readonly($readonlyInputs)>
                        @error('researcher_department')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                        <label class="form-label-small headers">Institute:</label>
                        <input wire:model.live='researcher_institution' type="text" class="form-control"
                            @readonly($readonlyInputs)>
                        @error('researcher_institution')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                        <label class="form-label-small headers">Phone:</label>
                        <input wire:model.live='researcher_phone' type="text" class="form-control"
                            @readonly($readonlyInputs) placeholder="+90**********">
                        @error('researcher_phone')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                        <label class="form-label-small headers">Address:</label>
                        <textarea wire:model.live='researcher_address' type="text" class="form-control" rows="3" @readonly($readonlyInputs)></textarea>
                        @error('researcher_address')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                        <label class="form-label-small headers">Email:</label>
                        <input wire:model.live='researcher_email' type="text" class="form-control"
                            @readonly($readonlyInputs)>
                        @error('researcher_email')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                    </div>
                </div>
                <!-- 4 -->
                <div class="mb-3 row" id="section-4">
                    <label class="form-label">4. Other Researchers (if any)</label>
                    <div class="col" style="margin: 10px">
                        <a wire:click.prevent="addResInput" class="btn btn-light w-25">Add</a>
                    </div>
                    <div id="inputContainer1">
                        @foreach ($other_researchers as $index => $researcher)
                            <div class="row">
                                <div class="col">
                                    <input wire:model.live="other_researchers.{{ $index }}.full_name"
                                        type="text" class="form-control" placeholder="Name" required
                                        @readonly($readonlyInputs)>
                                </div>
                                <div class="col">
                                    <input wire:model.live="other_researchers.{{ $index }}.institute"
                                        type="text" class="form-control" placeholder="Institute" required
                                        @readonly($readonlyInputs)>
                                </div>
                                <div class="col">
                                    <a wire:click.prevent="removeResInput({{ $index }})"
                                        class="btn btn-danger removeResInput">Remove</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



                <!-- 5 -->
                @if ($type_of_study !== 'Academic Staff Study')
                    <div class="mb-3 d-flex flex-wrap row">
                        <label class="form-label">
                            5. Advisor’s/Supervising Faculty Member’s <i>(Undergraduate students conducting research
                                must
                                have
                                an
                                academic advisor/instructor supervising their research):</i>
                        </label>

                        <div class="col-md">
                            <label class="form-label-small headers">Title:</label>
                            <select wire:model.live="advisor_title" class="form-select form-select-lg"
                                aria-label=".form-select-lg" @disabled($readonlyInputs)>
                                <option value="Prof. Dr." selected> Prof. Dr.</option>
                                <option value="Assoc. Pro. Dr.">Assoc. Pro. Dr.</option>
                                <option value="Asst. Prof. Dr.">Asst. Prof. Dr.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Sen. Instr.">Sen. Instr.</option>
                                <option value="Instr.">Instr.</option>
                            </select>
                            @error('advisor_title')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <label class="form-label-small headers">Name and surname:</label>
                            <input wire:model.live="advisor_name" type="text" class="form-control"
                                @readonly($readonlyInputs)>
                            @error('advisor_name')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <label class="form-label-small headers">Department:</label>
                            <input wire:model.live="advisor_department" type="text" class="form-control"
                                @readonly($readonlyInputs)>
                            @error('advisor_department')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                        </div>
                        <div class="col-md">
                            <label class="form-label-small headers">Phone:</label>
                            <input wire:model.live="advisor_phone" type="text" class="form-control"
                                placeholder="+90**********" @readonly($readonlyInputs)>
                            @error('advisor_phone')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <label class="form-label-small headers">Address:</label>
                            <input wire:model.live="advisor_address" type="text" class="form-control"
                                name="Address:" @readonly($readonlyInputs)>
                            @error('advisor_address')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <label class="form-label-small headers">E-mail:</label>
                            <input wire:model.live="advisor_email" type="text" class="form-control"
                                name="E-mail:" placeholder="example@gmail.com" @readonly($readonlyInputs)>
                            @error('advisor_email')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                        </div>
                    </div>
                @endif
                <!-- 6 -->
                <div class="mb-3 row">
                    <div class="form-label">6. Expected time frame of the study:</div>
                    <p>
                        <span class="warnings">The start date of the study should be at least three weeks from your
                            date
                            of
                            application.</span>
                    </p>
                    <div class="col-md">
                        <label class="form-label-small">Start:</label>
                        <input wire:model.live='expected_start' class="form-control" type="date" max="2040-12-31"
                            min="1995-01-01" @readonly($readonlyInputs)>
                        @error('expected_start')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                    </div>

                    <div class="col-md">
                        <label class="form-label-small">End:</label>
                        <input wire:model.live='expected_end' class="form-control" type="date" max="2040-12-31"
                            min="1995-01-01" @readonly($readonlyInputs)>
                        @error('expected_end')
                            <span class="text-danger">{{ $message }}</span></br>
                        @enderror
                    </div>
                </div>
                <!-- 7 -->
                <div class="mb-3 row">
                    <label class="form-label">7. Organizations, institutions in which data collection is planned to be
                        accomplished:</label>

                    <div class="col" style="margin: 10px">
                        <a wire:click.prevent="addOrgInput" class="btn btn-light w-25">Add</a>
                    </div>
                    <div id="inputContainer2">
                        @foreach ($organizations as $index => $organization)
                            <div class="row">
                                <div class="col">
                                    <input wire:model.live="organizations.{{ $index }}" type="text"
                                        class="form-control" placeholder="" required @readonly($readonlyInputs)>
                                </div>
                                <div class="col">
                                    <a wire:click.prevent="removeInputOrg({{ $index }})"
                                        class="btn btn-danger removeInput">Remove</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <!-- 8 -->
                <div class="mb-3 row">
                    <label for="" class="form-label">8. Is the approval/permission of an institution or
                        organization other than IFU required for data collection?</label>

                    <div class="form-check">
                        <input wire:click='showOtherInput1' wire:model.live="question_8" value="no"
                            class="form-check-input" type="radio">
                        <label class="form-label-small" for="flexCheckDefault1">No</label
                            @disabled($readonlyInputs)>
                    </div>

                    <div class="form-check">
                        <input wire:click='showOtherInput1' wire:model.live="question_8" value="yes"
                            class="form-check-input" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small" for="flexCheckDefault1">Yes(specify)</label>
                    </div>

                    <div class="col">
                        @if ($question_8 == 'yes')
                            <div class="col">
                                <input wire:model.live="question_8_1" type="text" class="form-control"
                                    @readonly($readonlyInputs)>
                                @error('question_8_1')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>
                        @endif
                    </div>

                    @error('question_8')
                        <span class="text-danger">This question field is required!</span></br>
                    @enderror
                </div>
                <!-- 9 -->
                <div class="mb-3 row">
                    <label for="" class="form-label">9. Whether the project is supported/funded or
                        not:</label>
                    <div class="form-check">
                        <input wire:model.live='question_9' class="form-check-input" value="Supported"
                            type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">Supported</label>
                    </div>
                    <div class="form-check">
                        <input wire:model.live='question_9' class="form-check-input" value="Not Supported"
                            type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">Not Suported</label>
                    </div>

                    @error('question_9')
                        <span class="text-danger">This question field is required!</span></br>
                    @enderror

                    <label for="" class="form-label">If supported, specify institution:</label>
                    <div class="form-check">
                        <input wire:click='showOtherInput2' wire:model.live='question_9_1' class="form-check-input"
                            value="University" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">University</label>
                    </div>
                    <div class="form-check">
                        <input wire:click='showOtherInput2' wire:model.live='question_9_1' class="form-check-input"
                            value="TUBITAK" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">TUBITAK</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-label-small" for="flexCheckDefault3">International (please
                                    specify)</label>
                                <input wire:click='showOtherInput2' wire:model.live='question_9_1'
                                    class="form-check-input" value="international" type="radio"
                                    @disabled($readonlyInputs)>
                            </div>
                            @if ($question_9_1 == 'international')
                                <input wire:model.live="question_9_2" type="text" class="form-control"
                                    @readonly($readonlyInputs)>
                                @error('question_9_2')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <label class="form-label-small" for="flexCheckDefault3">Other (please specify)</label>
                                <input wire:click='showOtherInput2' wire:model.live='question_9_1'
                                    class="form-check-input" value="other" type="radio"
                                    @disabled($readonlyInputs)>
                            </div>
                            @if ($question_9_1 == 'other')
                                <input wire:model.live="question_9_2" type="text" class="form-control"
                                    @readonly($readonlyInputs)>
                                @error('question_9_2')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>
                    </div>

                    @error('question_9_1')
                        <span class="text-danger">This question field is required!</span></br>
                    @enderror


                    <label for="" class="form-label">Will the ethical approval be used for a project
                        submission
                        (TUBITAK, EU
                        projects etc.)?</label>

                    <div class="form-check">
                        <input wire:click='showOtherInput3' wire:model.live='question_9_3' class="form-check-input"
                            type="radio" value="no"@disabled($readonlyInputs)>
                        <label class="form-label-small">No</label>
                    </div>
                    <div class="form-check">
                        <input wire:click='showOtherInput3' wire:model.live='question_9_3' class="form-check-input"
                            type="radio" value="yes"@disabled($readonlyInputs)>
                        <label class="form-label-small">Yes(specify)</label>
                    </div>

                    @error('question_9_3')
                        <span class="text-danger">This input field is required!</span></br>
                    @enderror


                    @if ($question_9_3 == 'yes')
                        <div class="col-6">
                            <input wire:model.live="question_9_4" type="text" class="form-control"
                                @readonly($readonlyInputs)>
                            @error('question_9_4')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    @endif


                </div>
                <!-- 10 -->
                <div class="mb-3 row">
                    <div class="form-label">10. Status of the application:</div>
                    <div class="form-check">
                        <input wire:click='showFields' wire:model.live='status' class="form-check-input"
                            value="New" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">New</label>
                    </div>
                    <div class="form-check">
                        <input wire:click='showFields' wire:model.live='status' class="form-check-input"
                            value="Revised" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">Revised</label>
                    </div>


                    <div class="form-check">
                        <input wire:click='showFields' wire:model.live='status' id="rpchanges"
                            class="form-check-input" value="Reporting Changes" type="radio"
                            @disabled($readonlyInputs)>
                        <label class="form-label-small" for="flexCheckDefault6">Reporting Changes</label>
                    </div>
                    <div class="form-check">
                        <input wire:click='showFields' wire:model.live='status' class="form-check-input"
                            value="Extension of a Previous Study" type="radio" @disabled($readonlyInputs)>
                        <label class="form-label-small">Extension of a Previous Study</label>
                    </div>
                </div>

                @error('status')
                    <span class="text-danger">This input field is required!</span></br>
                @enderror

                {{-- extension-of-previous-study-form --}}

                @if ($status === 'Extension of a Previous Study')
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label class="form-label">Protocol No (this is on your approval letter):</label>
                            <input wire:model.live='ex_protocol_no' style="width: 50%" type="text"
                                class="form-control" placeholder="" @readonly($readonlyInputs)>
                            @error('ex_protocol_no')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label class="form-label">The new expected date of completion:</label>
                            <input wire:model.live='extension_end_date' style="width: 50%" type="date"
                                class="form-control" placeholder="" @readonly($readonlyInputs)>
                            @error('extension_end_date')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>


                        <label class="form-label">If this is an extension of a previous project, does the current study
                            show any differences from
                            the previously
                            approved one?</label>
                        <div class="form-check">
                            <input wire:click='showRpChanges' wire:model.live='extension_q_1'
                                class="form-check-input" type="radio" value="no" @disabled($readonlyInputs)>
                            <label class="form-label-small">No</label>
                        </div>
                        <div class="form-check">
                            <input wire:click='showRpChanges' wire:model.live='extension_q_1'
                                class="form-check-input" type="radio" value="yes" @disabled($readonlyInputs)>
                            <label class="form-label-small">Yes</label>
                        </div>

                        @error('extension_q_1')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                @endif
                @if ($status === 'Reporting Changes' || $extension_q_1 === 'yes')
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">Protocol No:</label>
                            <input wire:model.live='rp_protocol_no' style="width: 50%" type="text"
                                class="form-control" @readonly($readonlyInputs)>

                            @error('rp_protocol_no')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                            <label class="form-label">Please explain the changes you want to make (e.g., adding a
                                new researcher to
                                the
                                research team,
                                adding a
                                new measure, adding a new study similar to your approved study) in a simple language so
                                that
                                people
                                with
                                no expertise in the field can understand (two paragraphs maximum). If, your change(s)
                                will be
                                new
                                informed
                                consent form, debriefing form, etc., submit these forms together with the revised
                                application to
                                the
                                Ethics
                                Committee.</label>
                            <textarea wire:model.live='reporting_q_1' type="text" class="form-control" @readonly($readonlyInputs) rows="3"></textarea>
                            @error('reporting_q_1')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <label class="form-label">Is the reason for the proposed changes an unexpected
                                situation that happens to a
                                participant in the
                                study
                                (e.g., an event that could harm the participant's psychological or physical
                                health)?</label>

                            <div class="form-check">
                                <input wire:model.live='reporting_q_2' class="form-check-input" type="radio"
                                    value="no" @disabled($readonlyInputs)>
                                <label class="form-label-small">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:model.live='reporting_q_2' class="form-check-input" type="radio"
                                    value="yes" @disabled($readonlyInputs)>
                                <label class="form-label-small">Yes</label>
                            </div>

                            @error('reporting_q_2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            @if ($reporting_q_2 == 'yes')
                                <label class="form-label">If your answer is yes; describe the unexpected situation that
                                    requires you to
                                    make
                                    changes. Please indicate
                                    what measures you have taken to prevent similar situations from occurring in the
                                    future.</label>
                                <textarea wire:model.live='reporting_q_2_1' type="text" class="form-control" @readonly($readonlyInputs) rows="3"></textarea>

                                @error('reporting_q_2_1')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>
                    </div>
                @elseif($status === 'New' || $status === 'Revised')
                    {{-- 11 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label" for="">11. Please explain the purpose of your study and
                                the
                                research question you
                                are
                                trying to
                                answer with this study.
                                Write it in a simple language so that people without expertise in the field can
                                understand
                                (maximum
                                of two
                                paragraphs).</label>
                            <textarea type="text" wire:model.live='question_11' class="form-control" placeholder="" rows="3"
                                @readonly($readonlyInputs)></textarea>
                            @error('question_11')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>

                    {{-- 12 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label" for="">12. Write down your data collection process,
                                including
                                the method, scale,
                                tools
                                and
                                techniques to be used.
                                (Submit a copy of any measure or questionnaire used in the research with this
                                document.)</label>
                            <textarea wire:model.live='question_12' type="text" class="form-control" placeholder="" rows="3"
                                @readonly($readonlyInputs)></textarea>
                            @error('question_12')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    {{-- 13 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label" for="">13. Does the study aim to partially/completely
                                provide
                                the participants
                                with
                                incorrect
                                information in any way. Is
                                there deception? Does the study require secrecy?</label>
                            <div class="form-check">
                                <input wire:model.live='question_13' class="form-check-input" type="radio"
                                    value="no" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:model.live='question_13' class="form-check-input" type="radio"
                                    value="yes" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            @error('question_13')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    {{-- 14 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label" for="" class="mt-2">14. Beyond the minimum stress and
                                discomfort that
                                participants
                                may encounter
                                in their
                                daily lives, does your
                                work contain elements that threaten their physical and/or mental health or that may be a
                                source
                                of
                                stress for
                                them?</label>
                            <div class="form-check">
                                <input wire:click='showOtherInput4' wire:model.live='question_14'
                                    class="form-check-input" type="radio" value="no"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput4' wire:model.live='question_14'
                                    class="form-check-input" type="radio" value="yes"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            @error('question_14')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                            @if ($question_14 == 'yes')
                                <label class="form-label" for="" class="mt-2">If your answer is yes; what
                                    negative
                                    effects does your
                                    work
                                    have
                                    on the
                                    physical and/or
                                    mental health of
                                    the participants? Please explain in detail. Please write down the measures taken in
                                    order to
                                    eliminate or
                                    minimize the effects of these elements.
                                </label>
                                <textarea wire:model.live='question_14_1' type="text" class="form-control" rows="3" @readonly($readonlyInputs)></textarea>
                                @error('question_14_1')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>

                    </div>


                    {{-- 15 --}}

                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">15. The expected number of
                                participants:</label>
                            <input wire:model.live='question_15' style="width: 15%" type="number"
                                class="form-control" @readonly($readonlyInputs)>
                            @error('question_15')
                                <span class="text-danger">This input field is empty or invalid!</span></br>
                            @enderror
                        </div>
                    </div>


                    {{-- 16 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">16. If you are doing an education or intervention study, will a
                                control
                                group
                                be
                                used?</label>
                            <div class="form-check">
                                <input wire:model.live='question_16' class="form-check-input" type="radio"
                                    value="no" name="flexRadioDefault11" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:model.live='question_16' class="form-check-input" type="radio"
                                    value="yes" name="flexRadioDefault11" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            @error('question_16')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    {{-- 17 --}}
                    <div class="row">
                        <label class="form-label">17. From the list presented below, tick the options that best
                            describe
                            the
                            participants:
                        </label>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.live='question_17.types.UniversityStudents'
                                    type="checkbox" value="University students" id="flexCheckDefault"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">
                                    University students
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.live='question_17.types.AdultsInEmployment'
                                    type="checkbox" value="Adults in employment" id="flexCheckChecked"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckChecked">
                                    Adults in
                                    employment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.live='question_17.types.UnemployedAdults'
                                    type="checkbox" value="Unemployed adults" id="flexCheckDefault"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">
                                    Unemployed adults
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.live='question_17.types.PreschoolChildren'
                                    type="checkbox" value="Preschool children" id="flexCheckChecked"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckChecked">
                                    Preschool children*
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-label-small">
                                    Mentally
                                    disabled/challenged
                                    individuals*
                                </label>
                                <input class="form-check-input"
                                    wire:model.live='question_17.types.MentallyDisabledChallengedIndividuals'
                                    type="checkbox" value="Mentally disabled/challenged individuals"
                                    id="flexCheckDefault" @disabled($readonlyInputs)>
                            </div>
                            <div class="form-check">
                                <label class="form-label-small">
                                    Physically
                                    disabled/challenged
                                    individuals
                                </label>
                                <input class="form-check-input"
                                    wire:model.live='question_17.types.PhysicallyDisabledChallengedIndividuals'
                                    type="checkbox" value="Physically disabled/challenged individuals"
                                    id="flexCheckDefault" @disabled($readonlyInputs)>
                            </div>
                            <br>
                            <label class="form-label-small">Will you obtain verbal consent from the children
                                participating
                                in
                                the
                                study?</label>

                            <div class="form-check">
                                <input wire:model.live='question_17_1' class="form-check-input" type="radio"
                                    value="no" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:model.live='question_17_1' class="form-check-input" type="radio"
                                    value="yes" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            @error('question_17_1')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="form-check">

                                <input style="margin-left: 15px" class="form-check-input"
                                    wire:model.live='question_17.types.HighschoolStudents' type="checkbox"
                                    value="Highschool students" id="flexCheckDefault" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Highschool
                                    students**
                                </label>
                            </div>
                            <div class="form-check">
                                <input style="margin-left: 15px" class="form-check-input"
                                    wire:model.live='question_17.types.PrimarySchoolPupils' type="checkbox"
                                    value="Primary school pupils" id="flexCheckDefault" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Primary school
                                    pupils*
                                </label>
                            </div>
                            <div class="form-check">

                                <input style="margin-left: 15px" class="form-check-input"
                                    wire:model.live='question_17.types.ChildWorkers' type="checkbox"
                                    value="Child workers" id="flexCheckDefault" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Child workers**
                                </label>
                            </div>
                            <div class="form-check">
                                <input style="margin-left: 15px" class="form-check-input"
                                    wire:model.live='question_17.types.TheElderly' type="checkbox"
                                    value="The elderly" id="flexCheckDefault" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    The elderly
                                </label>
                            </div>
                            <div class="form-check">
                                <input style="margin-left: 15px" class=" form-check-input"
                                    wire:model.live='question_17.types.Prisoners' type="checkbox" value="Prisoners"
                                    id="flexCheckDefault" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Prisoners
                                </label>
                            </div>
                            <br>
                            <label style="margin-top: 2.6rem;" class="form-label-small">Will you obtain verbal consent
                                from the pupils
                                participating in
                                the
                                study?</label>

                            <div class="form-check">
                                <input wire:model.live='question_17_2' class="form-check-input" type="radio"
                                    value="no" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            <div class="form-check">
                                <input wire:model.live='question_17_2' class="form-check-input" type="radio"
                                    value="yes" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            @error('question_17_2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">



                            <label style="margin-top: 4px" class="form-label-small">
                                Other (please specify):
                            </label>

                            <input style="width:50%; margin-left:10px;" class="form-control" type="text"
                                wire:model.live='question_17.other' @readonly($readonlyInputs)>
                        </div>


                        @error('question_17.types')
                            <span style="margin-top:10px " class="text-danger">Please select at least one option
                                above!</span></br>
                        @enderror
                    </div>



                    <div class="mb-3 row">
                        <label class="form-label-small warnings" for="">Please submit the Parental
                            Approval Form with your
                            application. <br><br>
                            Please submit the Parental Approval Form in addition to the Informed Consent Form that
                            the
                            students are expected to sign, with your application.</label>
                    </div>


                    {{-- 18 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">18. Briefly describe the sample characteristics, special
                                restrictions
                                and
                                conditions
                                for
                                participation (for example,
                                age group restriction, whether there is a requirement to be a member of a certain social
                                group,
                                etc.) Please
                                explain.</label>

                            <textarea wire:model.live='question_18' type="text" class="form-control" placeholder="" rows="3"
                                @readonly($readonlyInputs)></textarea>

                        </div>
                        @error('question_18')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>


                    {{-- 19 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label" for="">19. Explain how you will invite participants to
                                the
                                study. If the invitation will be via
                                e-mail,
                                social media,
                                various websites, and similar channels like this, you should insert the text of the
                                announcement
                                into the
                                application false. Please add the text in the textbox below.</label>

                            <textarea wire:model.live='question_19' type="text" class="form-control" placeholder="" rows="3"
                                @readonly($readonlyInputs)></textarea>
                        </div>
                        @error('question_19')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>

                    {{-- 20 --}}
                    <div class="mb-3 row">
                        <label class="form-label">20. Please tick the method(s) to be used:</label>
                        <div class="col">
                            <div class="form-check">
                                <label class="form-label-small">
                                    Survey
                                </label>
                                <input wire:model="question_20.types.Survey" class="form-check-input" type="checkbox"
                                    value="Survey" id="flexCheckSurvey" @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Interview
                                </label>
                                <input wire:model="question_20.types.Interview" class="form-check-input"
                                    type="checkbox" value="Interview" id="flexCheckInterview"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Observation
                                </label>
                                <input wire:model="question_20.types.Observation" class="form-check-input"
                                    type="checkbox" value="Observation" id="flexCheckObservation"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Computer test
                                </label>
                                <input wire:model="question_20.types.ComputerTest" class="form-check-input"
                                    type="checkbox" value="Computer test" id="flexCheckComputerTest"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Video/film recording
                                </label>
                                <input wire:model="question_20.types.VideoFilmRecording" class="form-check-input"
                                    type="checkbox" value="Video film recording" id="flexCheckVideoFilmRecording"
                                    @disabled($readonlyInputs)>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-check">
                                <label class="form-label-small">
                                    Voice recording
                                </label>
                                <input wire:model="question_20.types.VoiceRecording" class="form-check-input"
                                    type="checkbox" value="Voice recording" id="flexCheckVoiceRecording"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Physiological measurement
                                </label>
                                <input wire:model="question_20.types.PhysiologicalMeasurement"
                                    class="form-check-input" type="checkbox" value="Physiological measurement"
                                    id="flexCheckPhysiologicalMeasurement" @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Biological sample
                                </label>
                                <input wire:model="question_20.types.BiologicalSample" class="form-check-input"
                                    type="checkbox" value="Biological sample" id="flexCheckBiologicalSample"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Making participants use alcohol, drugs or any other chemical substance
                                </label>
                                <input wire:model="question_20.types.MakingParticipantsUseSubstance"
                                    class="form-check-input" type="checkbox"
                                    value="Making participants use alcohol, drugs or any other chemical substance"
                                    id="flexCheckMakingParticipantsUseSubstance" @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">
                                <label class="form-label-small">
                                    Exposure to high simulation (such as light, sound)
                                </label>
                                <input wire:model="question_20.types.ExposureToHighSimulation"
                                    class="form-check-input" type="checkbox"
                                    value="Exposure to high simulation (such as light, sound)"
                                    id="flexCheckExposureToHighSimulation" @disabled($readonlyInputs)>
                            </div>
                        </div>

                        <label class="form-label-small">
                            Other (Please specify):
                        </label>
                        <input wire:model="question_20.other" style="margin-left:10px; width: 50%"
                            class="form-control" type="text" @readonly($readonlyInputs)>

                        @error('question_20.types')
                            <span style="margin-top:10px " class="text-danger">Please select at least one option
                                above!</span></br>
                        @enderror
                    </div>

                    {{-- 21 --}}
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">21. Write down the possible contribution of this work to your
                                field
                                and/or
                                society(one
                                paragraph at most.)</label>
                            <textarea wire:model.live='question_21' type="text" class="form-control" placeholder="" rows="3"
                                @readonly($readonlyInputs)></textarea>

                        </div>
                        @error('question_21')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>
                @endif


                <div class="mb-3 row">
                    <label class="form-label" for="">I confirm that the information I have given above is
                        accurate
                        to the best of my knowledge</label>
                    <div class="col-md">
                        <label class="form-label">Supervisor's (if any) Name and Surname:</label>
                        <input wire:model.live='rname' class="form-control" type="text" @readonly($readonlyInputs)>
                        @error('rname')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="form-label">Date:</label>
                        <input wire:model.live='rdate' class="form-control" type="date" @readonly($readonlyInputs)>
                        @error('rdate')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md">
                        <label class="form-label">Researcher's Name and Surname:</label>
                        <input wire:model.live='sname' name="researcher_name" class="form-control" type="text"
                            @readonly($readonlyInputs)>
                        @error('sname')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>
                    <div class="col-md">
                        <label class="form-label">Date:</label>
                        <input wire:model.live='sdate' class="form-control" type="date" @readonly($readonlyInputs)>
                        @error('sdate')
                            <span class="text-danger">This input field is required</span></br>
                        @enderror
                    </div>

                </div>
            </form>
        </div>
    </div>
    {{-- Modal --}}
    <div>
        <div wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" id="myModal" class="modal"
            tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p class="">
                            @if (Session::has('success'))
                                <div class="text-center alert alert-success">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                                <hr>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                        </p>
                    </div>

                    <div class="modal-footer">
                        <a wire:click='redirectUserDashboard' type="button" class="btn btn-secondary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal --}}

    {{-- Modal --}}
    <div id="deleteModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert alert-warning">
                    <p>Are you sure you want to delete this data? This action is irreversible and will permanently
                        remove
                        the selected data from the system. </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="deleteBtn" wire:click='deleteForm1' style="margin-left: 10px" type="button"
                        class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal --}}
</div>


<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showModal', (event) => {
            $('#myModal').modal('show');

        });
    });

    $('#deleteBtn').click(function(e) {
        $('#deleteModal').modal('show');
    })
</script>
