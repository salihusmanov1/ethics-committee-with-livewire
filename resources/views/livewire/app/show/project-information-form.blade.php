<div>
    <link rel="stylesheet" href="/css/form.css">
    @section('title', $pageName)
    <div class="container">
        <div class="form">
            <div class="header">
                <h1>FINAL INTERNATIONAL UNIVERSITY</h1>
            </div>

            <div class="main">
                <form wire:submit='updateForm2'>
                    {{-- <div style="font-size: 16px; font-weight: bold;">
                        <div class="row">
                            <div class="col">
                                @if ($data->Checklist)
                                    <p><a class="link-opacity-50"
                                            href="{{ url('/show/checklist/' . $data->Checklist->id) }}"><i
                                                class="fa-regular fa-file-lines"></i> &nbspAttached Checklist Form</a>
                                    </p>
                                @endif


                            </div>
                            <div class="col-md">
                                <h3>№{{ $data->id }}</h3>
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
                    </div> --}}

                    <div class="row">
                        <div class="col-12 col-md-6" style="font-size: 16px; font-weight: bold;">
                            @if ($data->Checklist)
                                <p><a class="link-opacity-50"
                                        href="{{ url('/show/checklist/' . $data->Checklist->id) }}"><i
                                            class="fa-regular fa-file-lines"></i> &nbspAttached Checklist Form</a>
                                </p>
                            @endif
                            <p style="font-size: 24px"> No. {{ $data->id }}</p>
                        </div>


                        <div class="col-12 col-md-6">
                            @if (auth()->user()->role_id == 0)
                                <div class="row my-0">
                                    <div class="col-12 col-lg-8 d-flex p-2">
                                        <label class="form-label" style="margin-right: 10px">Status:</label>
                                        <select wire:model.live='select_status' class="form-select">
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
                                    <div class="col-12 col-lg-2 p-2"><button wire:click='updateStatus' type="button"
                                            class="btn btn-secondary">Save</button>
                                    </div>
                                    <div class="col-12 col-lg-2 p-2">
                                        <button id="deleteBtn" type="button" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->role_id == 1 && $data->status === 'New')
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button wire:click="enableEdit" type="button"
                                        class=" btn btn-outline-primary {{ $readonlyInputs ? '' : 'active' }}"><i
                                            class="bi bi-pencil-square"></i>&nbspEdit</button>

                                    <button type="submit" class=" btn btn-secondary"><i class="bi bi-download"></i>&nbspSave</button>


                                    <button id="deleteBtn" type="button" class="  btn btn-danger"><i class="bi bi-file-earmark-x"></i>&nbspDelete</button>

                                </div>
                            @endif


                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <img style="width: 15%" src="\img\logo6.png" alt="">
                    </div>

                    <h3>ETHICS COMMITTEE PROJECT INFORMATION FORM</h3>

                    <!-- 1 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">1. Briefly describe the study to be conducted, including the
                                sub-research
                                questions, and hypotheses if any.</label>
                            <textarea wire:model.live='question_1' type="text" class="form-control" placeholder="" rows="8"
                                @readonly($readonlyInputs)></textarea>
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
                            <textarea wire:model.live='question_2' type="text" class="form-control" placeholder="" rows="8"
                                @readonly($readonlyInputs)></textarea>
                            @error('question_2')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">3. Write down the expected results of your study.</label>
                            <textarea wire:model.live='question_3' type="text" class="form-control" placeholder="" rows="8"
                                @readonly($readonlyInputs)></textarea>
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
                                <input wire:click='showOtherInput' wire:model.live='question_4' class="form-check-input"
                                    type="radio" value="yes" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault2_0">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput' wire:model.live='question_4' class="form-check-input"
                                    type="radio" value="no" @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault2_0">No</label>
                            </div>
                            @error('question_4')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                            @if ($question_4 === 'yes')
                                <label class="form-label" for="">If yes, please explain. Specify the precautions
                                    that will be taken to eliminate or minimize the effects of
                                    these items/procedures.</label>
                                <div class="col">
                                    <textarea wire:model.live ="question_4_1" value="" type="text" class="form-control" rows="8"
                                        @readonly($readonlyInputs)></textarea>
                                </div>
                                @error('question_4_1')
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
                                <input wire:click='showOtherInput1' wire:model.live='question_5'
                                    class="form-check-input" type="radio" value="yes"@disabled($readonlyInputs)>
                                <label class="form-label-small">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput1' wire:model.live='question_5'
                                    class="form-check-input" type="radio" value="no"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small">No</label>
                            </div>
                            @error('question_5')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                            @if ($question_5 === 'yes')
                                <label for="" class="form-label">If yes, explain why.
                                    Indicate
                                    how
                                    this
                                    will
                                    be explained to the participants at the end of the data
                                    collection in debriefing the participants.</label>

                                <div class="col">
                                    <textarea wire:model.live ="question_5_1" value="" type="text" class="form-control" rows="8"
                                        @readonly($readonlyInputs)></textarea>
                                </div>
                                @error('question_5_1')
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
                            <textarea wire:model.live='question_6' type="text" class="form-control" placeholder="" rows="8"
                                @readonly($readonlyInputs)></textarea>
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
                                <input wire:click='showOtherInput2' wire:model.live='question_7'
                                    class="form-check-input" type="radio" value="yes"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">Yes</label>
                            </div>
                            <div class="form-check">
                                <input wire:click='showOtherInput2' wire:model.live='question_7'
                                    class="form-check-input" type="radio" value="no"
                                    @disabled($readonlyInputs)>
                                <label class="form-label-small" for="flexCheckDefault">No</label>
                            </div>
                            @error('question_7')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror


                            @if ($question_7 === 'yes')
                                <label for="" class="form-label">If your answer is yes,
                                    write
                                    down
                                    the
                                    titles, and dates of previous research projects you have conducted or
                                    that you have taken part in and the names of funding institution(s) if
                                    any.</label>
                                <div class="col">
                                    <textarea wire:model.live ="question_7_1" value="" type="text" class="form-control" rows="8"
                                        @readonly($readonlyInputs)></textarea>
                                </div>
                                @error('question_7_1')
                                    <span class="text-danger">This input field is required!</span></br>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Researcher’s name and surname:</label>
                            <input wire:model.live='rname' class="form-control" type="text" name="Name"
                                @readonly($readonlyInputs)>
                            @error('rname')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror

                            <br>
                            <br>
                            <br>
                        </div>
                        <div class="col">
                            <label class="form-label">Supervisor’s / Advisor’s name and surname:</label>
                            <input wire:model.live='sname' class="form-control" type="text" name="name"
                                @readonly($readonlyInputs)>
                            @error('sname')
                                <span class="text-danger">This input field is required!</span></br>
                            @enderror
                            <br>
                            <br>
                            <br>
                        </div>
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
                    <button id="deleteBtn" wire:click='deleteForm2' style="margin-left: 10px" type="button"
                        class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal --}}
</div>
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('show-modal', (event) => {

            $('#myModal').modal('show');

        });
    });
    $('#deleteBtn').click(function(e) {
        $('#deleteModal').modal('show');
    })
</script>
