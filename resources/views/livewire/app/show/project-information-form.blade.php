<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)
    <div class="container">
        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
            </div>

            <div class="main">
                <div style="font-size: 16px; font-weight: bold;">
                    <div class="row">
                        <div class="col">
                            <p><a class="link-opacity-50" href="{{ url('/show/checklist/' . $data->Checklist->id) }}"><i
                                        class="fa-regular fa-file-lines"></i> &nbspAttached Checklist Form</a>
                            </p>
                            <h3>№{{$data->id}}</h3>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <img style="width: 15%" src="\img\logo6.png" alt="">
                </div>
                
                <h3>ETHICS COMMITTEE PROJECT INFORMATION FORM</h3>
                <form>
                    <!-- 1 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">1. Briefly describe the study to be conducted, including the
                                sub-research
                                questions, and hypotheses if any.</label>
                            <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_1 }}</textarea>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">2. Explain the data collection plan, specifying the methods,
                                scales,
                                tools, and techniques to be used. (Please
                                hand in a copy of all types of instruments such as scales and questionnaires to be used
                                in the
                                study along
                                with this document.</label>
                            <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_2 }}</textarea>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">3. Write down the expected results of your study.</label>
                            <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_3 }}</textarea>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">4. Does your study involve items/procedures that may jeopardize
                                the
                                physical and/or psychological wellbeing
                                of the participants or that may be distressing for them?
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes"
                                        {{ $form->question_4 !== '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no"
                                        {{ $form->question_4 === '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">No</label>
                                </div>
                            </label>

                            @if ($form->question_4 !== '')
                                <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_4 }}</textarea>
                            @endif

                        </div>
                    </div>
                    <!-- 5 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">5. Will the participants be kept totally/partially uninformed of
                                the aim
                                of the study (i.e. is there deception)?
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes"
                                        {{ $form->question_5 !== '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no"
                                        {{ $form->question_5 === '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">No</label>
                                </div>
                            </label>

                            @if ($form->question_5 !== '')
                                <div class="col">
                                    <label for="" class="form-label">If yes, explain why.
                                        Indicate how
                                        this
                                        will
                                        be explained to the participants at the end of the data
                                        collection in debriefing the participants.</label>

                                    <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_5 }}</textarea>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- 6 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">6. Indicate the potential contributions of the study to your
                                research
                                area
                                and/or the society.</label>
                            <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_6 }}</textarea>
                        </div>
                    </div>
                    <!-- 7 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label"> 7. Have you completed any previous research project?
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes"
                                        {{ $form->question_7 !== '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no"
                                        {{ $form->question_7 === '' ? 'checked' : '' }}>
                                    <label class="form-label-small" for="flexCheckDefault">No</label>
                                </div>
                            </label>

                            @if ($form->question_7 !== '')
                                <div class="col">
                                    <label for="" class="form-label">If your answer is yes,
                                        write down
                                        the
                                        titles, and dates of previous research projects you have conducted or
                                        that you have taken part in and the names of funding institution(s) if
                                        any.</label>

                                    <textarea type="text" class="form-control" placeholder="" rows="8" readonly>{{ $form->question_7 }}</textarea>
                                </div>
                            @endif


                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Researcher’s name and surname:</label>
                            <input value="{{ $form->rname }}" class="form-control" type="text" readonly>
                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col">
                            <label class="form-label">Supervisor’s / Advisor’s name and surname:</label>
                            <input value="{{ $form->sname }}" class="form-control" type="text" readonly>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
