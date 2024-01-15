<div>
    <link rel="stylesheet" href="/css/form.css">
    <div>
        @section('title', $pageName)
        <div class="container">
            <div class="form">
                <div class="header">
                    <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
                </div>

                <form wire:submit='updateConsentForm' id="main" action="">
                    <div class="main">
                        <div style="font-size: 16px; font-weight: bold;">
                            <div class="row">
                                <div class="col">
                                    <p>Information Consent Form of Application #{{ $consent_form->form->app_id }}</p>
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
                        <h3>ETHICS COMMITTEE INFORMED CONSENT FORM</h3>


                        <p class="form-label consent-text">Dear Participant, </p>



                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text">This research project is being conducted by </p>
                            <input wire:model='researcher_name' class="form-control" type="text" readonly>
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text">of</p>
                            <input wire:model='researcher_institution' class="form-control" type="text" readonly>
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text">This research project aims
                                to investigate</p>
                            <input wire:model='survey' class="form-control" type="text" @readonly($readonlyInputs)>
                            @error('survey')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text"> This survey is intended for people <span
                                    style="font-style: italic; text-decoration:underline">18
                                    years or older</span>
                                The proposed study is entitled</p>
                            <input wire:model='researcher_title' class="form-control" type="text" readonly>
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text"> You will be a participant of the project if
                                you read and approve this informed consent form. The survey link will be active between
                            </p>

                        </div>

                        <div class="row consent-row justify-content-md-center">
                            <div class="col">
                                <input wire:model='start_date' class="form-control" type="date" @readonly($readonlyInputs)>
                                @error('start_date')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>

                            <p class="col-md-auto form-label consent-text"> and</p>
                            <div class="col">
                                <input wire:model='end_date' class=" col form-control" type="date" @readonly($readonlyInputs)>
                                @error('end_date')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>

                        </div>

                        <div class="">
                            <p class="form-label consent-text"> You are expected to participate in this survey study
                                only
                                once. The survey will be</p>
                            <div class="col">
                                <select wire:model.live='type' style="width: 25%;" class="form-select-lg"
                                    aria-label=".form-select-lg" @disabled($readonlyInputs)>
                                    <option hidden>Select</option>
                                    <option value="Online">Online</option>
                                    <option value="Face to face">Face to face</option>
                                </select> @error('type')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            </div>
                            <p class="form-label consent-text">This survey is anonymous. Other than being anonymous, no
                                information
                                is required to
                                identify you and you cannot be identified by the answers you supply. Information to be
                                obtained
                                within the scope of this study will only be shared in scientific publications,
                                presentations
                                and
                                online environments for educational purposes by the researcher. The data collected is
                                anonymous
                                and will be kept safely in an encrypted file on a computer. In our research, we
                                accept
                                and apply the basic principles</p>

                            <textarea wire:model='question_1' style="margin: 5px 0" class="form-control" name="" id=""
                                rows="3" @readonly($readonlyInputs)></textarea>

                            @error('question_1')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <p class="form-label consent-text">Participation in this study is voluntary. Your
                                participation in this project can
                                contribute
                                to
                                your knowledge about
                            </p>
                            <input wire:model='question_2' class="form-control" type="text" @readonly($readonlyInputs)>
                            @error('question_2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text"> and can support you in </p>
                            <input wire:model='question_3' class="form-control" type="text" @readonly($readonlyInputs)>
                            @error('question_3')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <p class="form-label consent-text">
                                None of
                                the steps in the survey can cause personal discomfort. However, if you feel
                                uncomfortable
                                for
                                any reason, you are free to quit the survey and leave the research without explaining
                                the
                                reason. In such a case, the information you provide will only be used by the researcher
                                with
                                your consent.

                                Thank you in advance for participating in this study. If you need any further
                                information
                                about
                                the study or if you have any question you would like to ask you can contact me on </p>

                        </div>

                        <div class="row consent-row justify-content-md-center">

                            <input wire:model='researcher_email' class="col form-control" type="email"
                                placeholder="email:" readonly>
                            <p class="col-md-auto form-label consent-text"></p>
                            <input wire:model='researcher_phone' class="col form-control" type="phone"
                                placeholder="phone:" readonly>

                        </div>
                        <p class="form-label consent-text"> Thank you, </p>

                        <br />
                        <div class="row consent-row justify-content-center">
                            <p class="col">I accept to participate in this research.</p>
                            <p class="col">Yes / No</p>

                        </div>
                        <div class="row consent-row justify-content-center">
                            <p class="col">I allow research use of my photos and videos</p>
                            <p class="col">Yes / No</p>
                        </div>
                        <div class="row consent-row justify-content-center">
                            <p class="col">I allow my photos and videos to be used in the following: </p>
                        </div>

                        <div class="row consent-row justify-content-center">
                            <p class="col-5">Online Education environments</p>
                            <p class="col-5">Yes / No</p>
                        </div>
                        <div class="row consent-row justify-content-center">
                            <p class="col-5">Visual and written materials such as reports, articles, related news.</p>
                            <p class="col-5">Yes / No</p>
                        </div>

                        <p>Name and Surname of the participant:</p>
                        <p>Signature:</p>
                        <p>Date:</p>

                        <p style="font-style: italic; margin-top: 30px">If you have questions about your participation
                            in the research and
                            the protection of your rights,
                            or if you believe that you are at risk or will be exposed to stress in any way, you can
                            contact
                            Final International University Ethics Committee (0392-6506666) by phone or via email
                            iaek@fiu.edu.tr</p>

                    </div>

                </form>
            </div>
        </div>


    </div>

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
                    <a wire:click='redirectToDashboard' type="button" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>

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
                    <button id="deleteBtn" wire:click='deleteConsentForm' style="margin-left: 10px" type="button"
                        class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-modal', (event) => {
            console.log('hi');
            $('#myModal').modal('show');

        });
        $('#deleteBtn').click(function(e) {
            $('#deleteModal').modal('show');
        })
    });
</script>
