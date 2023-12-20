<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)
    <div class="container">
        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
            </div>

            <div class="main">
                <div class="d-flex justify-content-center">
                    <img style="width: 15%" src="img\logo6.png" alt="">
                </div>
                <h3>ETHICS COMMITTEE PROJECT INFORMATION FORM</h3>
                <form wire:submit='createForm2' _lpchecked="1" method="POST" action="">
                    <!-- 1 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">1. Briefly describe the study to be conducted, including the
                                sub-research
                                questions, and hypotheses if any.</label>
                            <textarea wire:model='question_1' type="text" class="form-control" placeholder="" rows="8"></textarea>
                            @error('question_1')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">2. Explain the data collection plan, specifying the methods,
                                scales,
                                tools, and techniques to be used. (Please
                                hand in a copy of all types of instruments such as scales and questionnaires to be used
                                in
                                the
                                study along
                                with this document.</label>
                            <textarea wire:model='question_2' type="text" class="form-control" placeholder="" rows="8"></textarea>
                            @error('question_2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">3. Write down the expected results of your study.</label>
                            <textarea wire:model='question_3' type="text" class="form-control" placeholder="" rows="8"></textarea>
                            @error('question_3')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">4. Does your study involve items/procedures that may jeopardize
                                the
                                physical and/or psychological wellbeing
                                of the participants or that may be distressing for them?</label>
                            <div class="form-check">
                                <input wire:click='showOtherInput' wire:model='radioButtons1' class="form-check-input"
                                    type="radio" value="yes">
                                <label class="form-label-small" for="flexCheckDefault2_0">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput' wire:model='radioButtons1' class="form-check-input"
                                    type="radio" value="no">
                                <label class="form-label-small" for="flexCheckDefault2_0">No</label>
                            </div>
                            @error('radioButtons1')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                            @if ($radioButtons1 === 'yes')
                                <label class="form-label" for="">If yes, please explain. Specify the precautions
                                    that will be taken to eliminate or minimize the effects of
                                    these items/procedures.</label>
                                <div class="col">
                                    <textarea wire:model ="question_4" value="" type="text" class="form-control" rows="8"></textarea>
                                </div>
                                @error('question_4')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif

                        </div>
                    </div>
                    <!-- 5 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">5. Will the participants be kept totally/partially uninformed of
                                the
                                aim
                                of the study (i.e. is there deception)? </label>
                            <div class="form-check">
                                <input wire:click='showOtherInput1' wire:model='radioButtons2' class="form-check-input"
                                    type="radio" value="yes">
                                <label class="form-label-small">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput1' wire:model='radioButtons2' class="form-check-input"
                                    type="radio" value="no">
                                <label class="form-label-small">No</label>
                            </div>
                            @error('radioButtons2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                            @if ($radioButtons2 === 'yes')
                                <label for="" class="form-label">If yes, explain why.
                                    Indicate
                                    how
                                    this
                                    will
                                    be explained to the participants at the end of the data
                                    collection in debriefing the participants.</label>

                                <div class="col">
                                    <textarea wire:model ="question_5" value="" type="text" class="form-control" rows="8"></textarea>
                                </div>
                                @error('question_5')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
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
                            <textarea wire:model='question_6' type="text" class="form-control" placeholder="" rows="8"></textarea>
                            @error('question_6')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    <!-- 7 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label"> 7. Have you completed any previous research project?</label>
                            <div class="form-check">
                                <input wire:click='showOtherInput2' wire:model='radioButtons3'
                                    class="form-check-input" type="radio" value="yes">
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput2' wire:model='radioButtons3'
                                    class="form-check-input" type="radio" value="no">
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            @error('radioButtons3')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                            @if ($radioButtons3 === 'yes')
                                <label for="" class="form-label">If your answer is yes,
                                    write
                                    down
                                    the
                                    titles, and dates of previous research projects you have conducted or
                                    that you have taken part in and the names of funding institution(s) if
                                    any.</label>
                                <div class="col">
                                    <textarea wire:model ="question_7" value="" type="text" class="form-control" rows="8"></textarea>
                                </div>
                                @error('question_7')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Researcher’s name and surname:</label>
                            <input wire:model='rname' class="form-control" type="text" name="Name">
                            @error('rname')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col">
                            <label class="form-label">Supervisor’s / Advisor’s name and surname:</label>
                            <input wire:model='sname' class="form-control" type="text" name="name">
                            @error('sname')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                    <div class="button d-flex flex-row align-items-center justify-content-end">
                        <button type="submit" class="btn submit btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                                {{-- <div class="text-center alert alert-warning">
                                    <i style="" class="fa-solid fa-triangle-exclamation fa-xl"></i>
                                    <p>
                                        Please be aware that in order to complete your application, "Ethics Committee
                                        Application Control
                                        List" must be filled. Please navigate to the "Application Control List" section
                                        in
                                        the
                                        menu and fill
                                        out the
                                        required information.</p>
                                </div> --}}
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
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showModal', (event) => {
            $('#myModal').modal('show');

        });
    });
</script>
