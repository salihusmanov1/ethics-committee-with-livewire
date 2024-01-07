<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)
    <div class="container">
        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>

            </div>
            <form>

                <div class="main">
                    <div class="checklist" style="font-size: 16px; font-weight: bold;">
                        <div class="row">
                            <div class="col">
                                <p>Checklist Form of Application #{{$form->app_id}}</p>
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

                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col col-sm-3">
                            <div class="form-check">
                                <input {{ $form->attach_form === 'Ethics Committee Application Form' ? 'checked' : '' }}
                                    class="form-check-input" value="Ethics Committee Application Form" type="radio" disabled>
                                <label class="form-label-small" for="form_list">
                                    Ethics Committee Application Form
                                </label>
                            </div>
                        </div>
                        <div class="col col-sm-3">
                            <div class="form-check">
                                <input {{ $form->attach_form === 'Project Information Form' ? 'checked' : '' }}
                                    class="form-check-input" value="Project Information Form" type="radio" disabled>
                                <label class="form-label-small" for="form_list">
                                    Project Information Form
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input {{ $form->attach_form === 'Informed Consent Form' ? 'checked' : '' }}
                                    class="form-check-input" value="Informed Consent Form" type="radio" disabled>
                                <label class="form-label-small" for="form_list">
                                    Informed Consent Form
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="form-label">Parent/Guardian Consent Form</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input {{ $form->attach_parental === 'Yes' ? 'checked' : '' }} class="form-check-input"
                                    value="Yes" type="radio" disabled>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input {{ $form->attach_parental === 'No' ? 'checked' : '' }} class="form-check-input"
                                    value="No" type="radio" disabled>
                                <label class="form-label-small">
                                    Not Needed
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <label class="form-label">Debriefing Form</label>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input {{ $form->debriefing === 'Yes' ? 'checked' : '' }} class="form-check-input"
                                    value="Yes" type="radio" disabled>
                                <label class="form-label-small">
                                    Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="form-check">
                                <input {{ $form->debriefing === 'No' ? 'checked' : '' }} class="form-check-input"
                                    value="No" type="radio" disabled>
                                <label class="form-label-small">
                                    Not Needed
                                </label>
                            </div>
                        </div>
                        <div class="col col-sm-3">
                            <div class="form-check">
                                <input {{ $form->debriefing === 'Tools' ? 'checked' : '' }} class="form-check-input"
                                    value="Tools" type="radio" disabled>
                                <label class="form-label-small" for="data_checklist">
                                    An example of data collection tools (including online forms, applications, etc.)
                                </label>
                            </div>
                        </div>

                    </div>



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
                                    <input {{ $form->question_1 === 'Yes' ? 'checked' : '' }} class="form-check-input"
                                        value="Yes" type="radio" disabled>
                                </div>
                                <div class="form-check">
                                    <input {{ $form->question_1 === 'No' ? 'checked' : '' }} class="form-check-input"
                                        value="No" type="radio" disabled>
                                </div>
                                <div class="form-check">
                                    <input {{ $form->question_1 === 'N/A' ? 'checked' : '' }} class="form-check-input"
                                        value="N/A" type="radio" disabled>
                                </div>
                            </div>
                        </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_2_a === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_2_a === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_2_a === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_2_b === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_2_b === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_2_b === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_a === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_a === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_a === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">b. Anticipated time for data collection</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_b === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_b === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_b === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_c === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_c === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_c === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">d. Participation was on a voluntary basis</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_d === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_d === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_d === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>


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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_e === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_e === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_e === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">f. Possible consequences of giving up</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_f === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_f === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_f === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">g. Potential risks, discomfort, or adverse e
                                    ects</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_g === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_g === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_g === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_h === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_h === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_h === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_i === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_i === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_i === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small">j. Incentives (if any) for participation</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_j === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_j === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_j === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_3_k === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_3_k === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_3_k === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>

                        </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_4 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_4 === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">

                                </div>
                            </div>
                        </div>


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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_5 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_5 === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_5 === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_6 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_6 === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_6 === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>


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
                                    type="radio" disabled {{ $form->question_7 === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check">
                                <input wire:click='showSectionOf7' class="form-check-input" value="No"
                                    type="radio" disabled {{ $form->question_7 === 'No' ? 'checked' : '' }}>
                            </div>

                            <div class="form-check">

                            </div>
                        </div>
                    </div>

                    @if ($form->question_7 === 'Yes')
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
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_7_a === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_7_a === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio" disabled
                                            {{ $form->question_7_a === 'N/A' ? 'checked' : '' }}>
                                    </div>
                                </div>

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
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_7_b === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_7_b === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio" disabled
                                            {{ $form->question_7_b === 'N/A' ? 'checked' : '' }}>
                                    </div>
                                </div>

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
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_7_c === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_7_c === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" value="N/A" type="radio" disabled
                                            {{ $form->question_7_c === 'N/A' ? 'checked' : '' }}>
                                    </div>
                                </div>

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
                                    type="radio" disabled {{ $form->question_8 === 'Yes' ? 'checked' : '' }}>
                            </div>
                            <div class="form-check">
                                <input wire:click="showSectionOf8" class="form-check-input" value="No"
                                    id="no-8" type="radio" disabled {{ $form->question_8 === 'No' ? 'checked' : '' }}>
                            </div>

                            <div class="form-check">

                            </div>

                        </div>

                    </div>
                    @if ($form->question_8 === 'Yes')
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
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_8_a === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_8_a === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">b. Is it stated that any deception necessary
                                        for
                                        the
                                        healthy
                                        conduct of
                                        the research will be disclosed to the participants at the end of the
                                        participation and as early as possible (debriefing)?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_8_b === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_8_b === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">c. Has a debriefing form been submitted in the
                                        case
                                        of
                                        deception
                                        in the
                                        research?</label>
                                </div>
                                <div class="col-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Yes" type="radio" disabled
                                            {{ $form->question_8_c === 'Yes' ? 'checked' : '' }}>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="No" type="radio" disabled
                                            {{ $form->question_8_c === 'No' ? 'checked' : '' }}>
                                    </div>

                                    <div class="form-check">

                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <label class="form-label-small">d. Does the Debriefing Form contain the
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
                                            <input class="form-check-input" value="Yes" type="radio" disabled
                                                {{ $form->question_8_d_i === 'Yes' ? 'checked' : '' }}>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio" disabled
                                                {{ $form->question_8_d_i === 'No' ? 'checked' : '' }}>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio" disabled
                                                {{ $form->question_8_d_i === 'N/A' ? 'checked' : '' }}>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-7">
                                        <label class="form-label-small">ii. Reason for deception</label>
                                    </div>
                                    <div class="col-3 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" value="Yes" type="radio" disabled
                                                {{ $form->question_8_d_ii === 'Yes' ? 'checked' : '' }}>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio" disabled
                                                {{ $form->question_8_d_ii === 'No' ? 'checked' : '' }}>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio" disabled
                                                {{ $form->question_8_d_ii === 'N/A' ? 'checked' : '' }}>
                                        </div>
                                    </div>

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
                                            <input class="form-check-input" value="Yes" type="radio" disabled
                                                {{ $form->question_8_d_iii === 'Yes' ? 'checked' : '' }}>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="No" type="radio" disabled
                                                {{ $form->question_8_d_iii === 'No' ? 'checked' : '' }}>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" value="N/A" type="radio" disabled
                                                {{ $form->question_8_d_iii === 'N/A' ? 'checked' : '' }}>
                                        </div>
                                    </div>

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
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_9 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_9 === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_9 === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">10.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> Is it specifed how research data will be
                                    recorded
                                    (consistent
                                    with the principle
                                    of condentiality)?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_10 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_10 === 'No' ? 'checked' : '' }}>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" value="N/A" type="radio" disabled
                                        {{ $form->question_10 === 'N/A' ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-7">
                            <label class="form-label">11.</label>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <label class="form-label-small"> Is it specifed how research data will be
                                    stored
                                    (locker or encrypted electronic file)?</label>
                            </div>
                            <div class="col-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" value="Yes" type="radio" disabled
                                        {{ $form->question_11 === 'Yes' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="No" type="radio" disabled
                                        {{ $form->question_11 === 'No' ? 'checked' : '' }}>
                                </div>
                                <div class="form-check">

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>

    </div>
