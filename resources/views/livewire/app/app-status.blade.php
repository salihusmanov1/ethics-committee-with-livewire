<div>
    {{-- <link rel="stylesheet" href="/css/appstatus.css"> --}}
    {{-- Be like water. --}}
    @section('title', $pageName)

    <div class="text-bg-light">
        <div class="container py-3">
            @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="table-responsive shadow-sm bg-white p-2">
                <table class="table  w-100" id="myTable" data-turbolinks="false">
                    <thead class="table-light">
                        {{-- TABLE HEADING --}}
                        <tr>
                            <th class="top-left" scope="col">Application No</th>
                            <th scope="col">Application type</th>
                            <th scope="col">Status</th>
                            @if (auth()->user()->role_id == 0)
                                <th scope="col">User Email</th>
                            @endif
                            <th class="text-start" scope="col">Created</th>

                        </tr>
                    </thead>

                    <tbody class="table-group-divider">

                        @foreach ($datas as $data)
                            <tr>
                                {{-- ID --}}
                                <th scope="row"><i class="fa-regular fa-file-lines"></i><button class="btn btn-link"
                                        wire:click.prevent="$dispatch('dataSent', { formType: {{ $data->form->id }}, formId: {{ $data->id }} })">
                                        #{{ $data->id }}
                                    </button></th>
                                {{-- TYPE --}}
                                <td>{{ $data->form->name }}</td>

                                {{-- STATUS --}}

                                <td>{{ $data->status }}</td>

                                {{-- EMAIL --}}
                                @if (auth()->user()->role_id == 0)
                                    <td>{{ $data->user_email }}</td>
                                @endif
                                {{-- DATA --}}
                                <td class="text-start">{{ $data->created_at->format('Y-m-d') }}</td>

                                {{-- COMMENT --}}

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



        </div>
    </div>


    <style>
        .table th,
        td {
            vertical-align: middle !important;
            padding: 20px !important;
        }

        thead th {
            color: #ffffff !important;
            background-color: #2D3142 !important;
        }
    </style>
</div>

<script>
    var dataTable = $('#myTable').DataTable();
    document.addEventListener("turbolinks:before-cache", function() {
        if (dataTable !== null) {
            dataTable.destroy();
            dataTable = null;
        }
    });
</script>
