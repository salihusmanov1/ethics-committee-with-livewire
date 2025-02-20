<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)
    <div class="container">
        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>

            </div>
            <form wire:submit='updateChecklistForm'>

                <div class="main">
                    <div class="checklist" style="font-size: 16px; font-weight: bold;">
                        <div class="row">
                            <div class="col">
                                <p>Checklist Form of Application #{{ $checklist_form->app->id }}</p>
                            </div>
                            <div style="width: 100%" class="col d-flex justify-content-end">
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
                    <h3>ETHICS COMMITTEE PROJECT APPLICATION CHECKLIST</h3>
                    <h4 class="form-description">Researchers applying to the Final International University (FIU) Ethics
                        Committee to
                        conduct a research
                        that requires data collection from people must have completed all the documents listed in the
                        Application
                        Checklist. Please review the Application Checklist below. Fill this form and attach it to the
                        beginning
                        of your application list</h4>

                    <div class="row">
                        <label class="form-label">Parent/Guardian Consent Form</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='attach_parental' class="form-check-input" value="Yes"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='attach_parental' class="form-check-input" value="No"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Not Needed
                                </label>
                            </div>
                        </div>
                        @error('attach_parental')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    @if ($attach_parental === 'Yes')

                        @if ($checklist_form->file1)
                            <div class="d-flex justify-content-between align-items-center"
                                style="width: 15%; margin-bottom: 20px">
                                <a href="{{ $file1_old }}" target="_blank"
                                    download="{{ $checklist_form->file1 }}">Parental-Approval.doc</a>

                                <button class="btn btn-link" type="button" wire:click='deleteFile1'
                                    @disabled($readonlyInputs)>
                                    <i class="fa-solid fa-trash-can text-danger"></i></button>
                            </div>
                        @endif
                        <div>
                            <input style="width: 50%" class="form-control" wire:model.live='file1' type="file"
                                accept=".doc" @disabled($checklist_form->file1 || $readonlyInputs)>
                        </div>
                    @endif

                    <div class="row">
                        <label class="form-label">Debriefing Form</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='debriefing' class="form-check-input" value="Yes"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='debriefing' class="form-check-input" value="No"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    No
                                </label>
                            </div>
                        </div>
                        @error('debriefing')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                    @if ($debriefing === 'Yes')
                        @if ($checklist_form->file2)
                            <div class="d-flex justify-content-between align-items-center"
                                style="width: 15%; margin-bottom: 20px">
                                <a href="{{ $file2_old }}" target="_blank"
                                    download="{{ $checklist_form->file2 }}">Debriefing-Form.doc</a>

                                <button class="btn btn-link" type="button" wire:click='deleteFile2  '
                                    @disabled($readonlyInputs)>
                                    <i class="fa-solid fa-trash-can text-danger"></i></button>
                            </div>
                        @endif
                        <div>
                            <input style="width: 50%" class="form-control" wire:model.live='file2' type="file"
                                accept=".doc" @disabled($checklist_form->file2 || $readonlyInputs)>
                        </div>
                    @endif


                    <div class="row">
                        <label class="form-label">Permisson</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='permission' class="form-check-input" value="Yes"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='permission' class="form-check-input" value="No"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    No
                                </label>
                            </div>
                        </div>
                        @error('permission')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                    @if ($permission === 'Yes')
                        @if ($checklist_form->file3)
                            <div class="d-flex justify-content-between align-items-center"
                                style="width: 15%; margin-bottom: 20px">
                                <a href="{{ $file3_old }}" target="_blank"
                                    download="{{ $checklist_form->file3 }}">Permission.doc</a>

                                <button class="btn btn-link" type="button" wire:click='deleteFile3'
                                    @disabled($readonlyInputs)><i
                                        class="fa-solid fa-trash-can text-danger"></i></button>
                            </div>
                        @endif
                        <div>
                            <input style="width: 50%" class="form-control" wire:model.live='file3' type="file"
                                accept=".doc" @disabled($checklist_form->file3 || $readonlyInputs)>
                        </div>
                    @endif

                    <div class="row">
                        <label class="form-label">Tools</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='tools' class="form-check-input" value="Yes"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='tools' class="form-check-input" value="No"
                                    type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    No
                                </label>
                            </div>
                        </div>
                        @error('tools')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                    @if ($tools === 'Yes')
                        <div>
                            <textarea wire:model.live='tools_text' class="form-control" name="" id="" rows="3"
                                @readonly($readonlyInputs)></textarea>
                        </div>
                        @error('tools_text')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    @endif


                    {{-- <div class="row">
                        <label class="form-label">Debriefing Form</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='debriefing' class="form-check-input" value="Yes" type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='debriefing' class="form-check-input" value="No" type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small">
                                    Not Needed
                                </label>
                            </div>
                        </div>
                        @if ($file1)
                        <a href="{{ $file1 }}" target="_blank" download="{{ $checklist_form->file1 }}">Download File 1</a>
                        @endif
                        <div class="col col-sm-3">
                            <div class="form-check">
                                <input wire:model.live='debriefing' class="form-check-input" value="Tools" type="radio" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="data_checklist">
                                    An example of data collection tools (including online forms, applications, etc.)
                                </label>
                            </div>
                        </div>
                        @error('debriefing')
                        <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                    @if ($file2)
                    <a href="{{ $file2 }}" target="_blank" download="{{ $checklist_form->file2 }}">Download File 2</a>
                    @endif --}}


                    <div class="row">

                        <h4>POINTS TO BE CONSIDERED DURING ETHICAL ASSESSMENT</h4>
                        <h4 style="color: red">THE N/A OPTION SHOULD BE USED FOR THOSE QUESTIONS NOT APPLICABLE
                            (For example, if archival records are not to be used, N/A should be marked in Question
                            1.)
                        </h4 style="color: red">

                    </div>
                    <div class="row">
                        <div class="col-7">

                        </div>
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <label for="">Yes</label>
                            <label for="">No</label>
                            <label for="">N/A</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">1.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">If archival records are to be used in the research,
                                    has
                                    the
                                    relevant
                                    legal
                                    regulations been complied with and permission has been obtained?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input wire:model.live='question_1' class="form-check-input" value="Yes"
                                        type="radio" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input wire:model.live='question_1' class="form-check-input" value="No"
                                        type="radio" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input wire:model.live='question_1' class="form-check-input" value="N/A"
                                        type="radio" @disabled($readonlyInputs)>
                                </div>
                            </div>
                        </div>
                        @error('question_1')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">2. Random assignment</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">a. Is it clear that the selection/assignment of the
                                    research
                                    participants
                                    will
                                    be done randomly?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_2_a" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_2_a" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_2_a" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_2_a')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">b. If one or more control groups are used, is it
                                    clear
                                    that
                                    the
                                    assignment
                                    of the participants to di erent groups (experimental and control groups)
                                    will be done randomly?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_2_b" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_2_b" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_2_b" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_2_b')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">3. Does the informed consent form contain the following
                                items?</label>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">a. The purpose of the research</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_a" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_a" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_a" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_a')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">b. Anticipated time for data collection</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_b" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_b" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_b" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_b')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">c. What the participants are expected to do during
                                    the
                                    data
                                    collection
                                    process (for example, lling out a questionnaire, computer-based
                                    application, etc.)</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_c" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_c" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_c" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_c')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">d. Participation was on a voluntary basis</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_d" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_d" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_d" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_d')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">e. The participants right to opt out after the
                                    research
                                    has
                                    begun</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_e" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_e" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_e" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_e')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">f. Possible consequences of giving up</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_f" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_f" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_f" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_f')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">g. Potential risks, discomfort, or adverse e
                                    ects</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_g" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_g" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_g" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_g')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">h. How and for what purpose the information
                                    obtained
                                    will
                                    be
                                    used</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_h" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_h" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_h" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_h')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">i. How the participants identity and institution
                                    information
                                    will
                                    be based
                                    on con dentiality (anonymity) or how this information will be used and
                                    protected by researchers in cases where identity/institution information
                                    is required</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_i" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_i" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_i" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_i')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">j. Incentives (if any) for participation</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_j" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_j" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_j" @disabled($readonlyInputs)>
                                </div>
                            </div>
                            @error('question_3_j')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">k. By whom the research was conducted and how to
                                    reach
                                    them
                                    (for
                                    large
                                    teams, only the name of the lead person may be written.)</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_3_k" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_3_k" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_3_k" @disabled($readonlyInputs)>
                                </div>
                            </div>

                        </div>
                        @error('question_3_k')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>



                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">4.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">Does the researcher have a dual role in the
                                    research
                                    that
                                    will
                                    create a con ict
                                    of interest?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_4" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_4" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">

                                </div>
                            </div>
                        </div>
                        @error('question_4')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">5.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> If the information is to be collected in the
                                    research
                                    on
                                    sensitive
                                    issues (sexual
                                    orientation, substance use, illegitimate behaviors, etc.), are measures taken to
                                    protect the rights of the participants and ensure condentiality?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_5" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_5" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_5" @disabled($readonlyInputs)>
                                </div>
                            </div>
                        </div>
                        @error('question_5')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">6.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> If any audio or video recording is to be taken, is
                                    it
                                    stated
                                    that
                                    prior permission
                                    will be obtained?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_6" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_6" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_6" @disabled($readonlyInputs)>
                                </div>
                            </div>
                        </div>
                        @error('question_6')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">7. Will research be conducted with students or people working
                                for
                                the
                                researchers?
                                If the answer is no, or there are no incentives and no negative consequences of
                                their refusal to participate, skip to question 8.</label>
                        </div>

                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input wire:click='showSectionOf7' class="form-check-input" value="Yes"
                                    type="radio" wire:model.live="question_7" @disabled($readonlyInputs)>
                            </div>
                            <div class="form-check">
                                <input wire:click='showSectionOf7' class="form-check-input" value="No"
                                    type="radio" wire:model.live="question_7" @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">

                            </div>
                        </div>
                    </div>

                    @error('question_7')
                        <span class="text-danger">This input field is required!</span></br>
                    @enderror

                    @if ($question_7 === 'Yes')
                        <div class="row">
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">a. Are measures taken to protect participants
                                        against
                                        the
                                        negative
                                        consequences of their refusal to participate in the research or their
                                        withdrawal?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_7_a" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_7_a" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio"
                                            wire:model.live="question_7_a" @disabled($readonlyInputs)>
                                    </div>
                                </div>
                                @error('question_7_a')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">b. If participation in the research will
                                        provide
                                        extra
                                        points
                                        as required by
                                        the course; are di erent options o ered to those who may choose not to
                                        participate?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_7_b" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_7_b" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio"
                                            wire:model.live="question_7_b" @disabled($readonlyInputs)>
                                    </div>
                                </div>
                                @error('question_7_b')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">c. Are the economic or other incentives (extra
                                        points
                                        for
                                        the course) to be
                                        provided to the participants for participation in the research in amounts
                                        that make participation compulsory?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_7_c" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_7_c" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio"
                                            wire:model.live="question_7_c" @disabled($readonlyInputs)>
                                    </div>
                                </div>
                                @error('question_7_c')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">8. Will deception be used? If your answer is no skip to
                                question
                                9.</label>
                        </div>
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input wire:click="showSectionOf8" class="form-check-input" value="Yes"
                                    type="radio" wire:model.live="question_8" @disabled($readonlyInputs)>
                            </div>
                            <div class="form-check">
                                <input wire:click="showSectionOf8" class="form-check-input" value="No"
                                    id="no-8" type="radio" wire:model.live="question_8"
                                    @disabled($readonlyInputs)>
                            </div>

                            <div class="form-check">

                            </div>

                        </div>
                        @error('question_8')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>
                    @if ($question_8 === 'Yes')
                        <div class="row">
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">a. Will deception be used in a situation where
                                        it
                                        can
                                        be
                                        predicted to cause
                                        physical pain or severe emotional distress to the participant?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_8_a" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_8_a" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>
                                @error('question_8_a')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">b. Is it stated that any deception necessary
                                        for
                                        the
                                        healthy
                                        conduct of
                                        the research will be disclosed to the participants at the end of the
                                        participation and as early as possible (debrie ng)?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_8_b" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_8_b" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>
                                @error('question_8_b')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">c. Has a debrie ng form been submitted in the
                                        case
                                        of
                                        deception
                                        in the
                                        research?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio"
                                            wire:model.live="question_8_c" @disabled($readonlyInputs)>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio"
                                            wire:model.live="question_8_c" @disabled($readonlyInputs)>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>
                                @error('question_8_c')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">d. Does the Debrie ng Form contain the
                                        following
                                        items
                                        (i-iii)?</label>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <label class="form-label-small">i. The real purpose of the research</label>
                                    </div>
                                    <div class="col-3 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" value="Yes" type="radio"
                                                wire:model.live="question_8_d_i" @disabled($readonlyInputs)>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio"
                                                wire:model.live="question_8_d_i" @disabled($readonlyInputs)>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio"
                                                wire:model.live="question_8_d_i" @disabled($readonlyInputs)>
                                        </div>
                                    </div>
                                    @error('question_8_d_i')
                                        <span class="text-danger">This input field is required!</span></br>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <label class="form-label-small">ii. Reason for deception</label>
                                    </div>
                                    <div class="col-3 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" value="Yes" type="radio"
                                                wire:model.live="question_8_d_ii" @disabled($readonlyInputs)>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio"
                                                wire:model.live="question_8_d_ii" @disabled($readonlyInputs)>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio"
                                                wire:model.live="question_8_d_ii" @disabled($readonlyInputs)>
                                        </div>
                                    </div>
                                    @error('question_8_d_ii')
                                        <span class="text-danger">This input field is required!</span></br>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <label class="form-label-small">iii. The participants potential questions
                                            or
                                            ideas
                                            can
                                            be
                                            forwarded to
                                            the researcher or FIU Ethical Committee.</label>
                                    </div>
                                    <div class="col-3 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" value="Yes" type="radio"
                                                wire:model.live="question_8_d_iii" @disabled($readonlyInputs)>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio"
                                                wire:model.live="question_8_d_iii" @disabled($readonlyInputs)>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio"
                                                wire:model.live="question_8_d_iii" @disabled($readonlyInputs)>
                                        </div>
                                    </div>
                                    @error('question_8_d_iii')
                                        <span class="text-danger">This input field is required!</span></br>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">9.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> If there are possible risks that may arise
                                    during
                                    the
                                    research, have necessary
                                    measures been explained to minimize or compensate for the harm done to the
                                    participant if it is realized?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_9" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_9" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_9" @disabled($readonlyInputs)>
                                </div>
                            </div>
                        </div>
                        @error('question_9')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">10.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> Is it speci ed how research data will be
                                    recorded
                                    (consistent
                                    with the principle
                                    of condentiality)?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_10" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_10" @disabled($readonlyInputs)>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio"
                                        wire:model.live="question_10" @disabled($readonlyInputs)>
                                </div>
                            </div>
                        </div>
                        @error('question_10')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">11.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> Is it speci ed how research data will be
                                    recorded
                                    (consistent
                                    with the principle
                                    of condentiality)?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio"
                                        wire:model.live="question_11" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio"
                                        wire:model.live="question_11" @disabled($readonlyInputs)>
                                </div>
                                <div class="form-check">

                                </div>
                            </div>
                        </div>
                        @error('question_11')
                            <span class="text-danger">This input field is required!</span></br>
                        @enderror
                    </div>

                </div>
            </form>
        </div>



        {{-- Message Modal --}}
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
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                        </p>
                    </div>

                    <div class="modal-footer">
                        <a wire:navigate href="/user-dashboard" type="button" class="btn btn-secondary">Close</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- End of Message Modal --}}

        <div id="deleteModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body alert alert-warning">
                        <p>Are you sure you want to delete this data? This action is irreversible and will permanently
                            remove
                            the selected data from the system. </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button wire:click='deleteChecklistForm' style="margin-left: 10px" type="button"
                            class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showMessageModal', (event) => {
            $('#myModal').modal('show');

        });
    });

    $('#deleteBtn').click(function(e) {
        $('#deleteModal').modal('show');
    })
</script>
