<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/main.js"></script>

    {{-- Jquery Datatable --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.7/b-3.0.2/fh-4.0.1/r-3.0.2/sp-2.3.1/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.7/b-3.0.2/fh-4.0.1/r-3.0.2/sp-2.3.1/datatables.min.js"></script>
    {{-- <link rel="stylesheet" href="/css/navigation.css"> --}}



</head>

<body>
    <main class="d-flex flex-nowrap">
        <!-- Sidebar -->
        {{-- <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center primary-text fs-3 fw-bold text-uppercase border-bottom">
                Dashboard
            </div>
            <div class="list-group list-group-flush my-3">
                @if (auth()->user()->role_id == 1)
                    <a href="{{ url('/user-dashboard') }}" class="list-group-item bg-transparent second-text">Home</a>
                @endif
                @if (auth()->user()->role_id == 0)
                    <a href="{{ route('admin-dashboard') }}" class="list-group-item bg-transparent second-text">Home</a>
                @endif
                <div>
                    <button id="btn" class="list-group-item bg-transparent second-text" data-bs-toggle="collapse"
                        data-bs-target="#subCategory" aria-expanded="false" aria-controls="subCategory"
                        class="collapse list-group-item bg-transparent second-text">Forms
                        <i id="icon" class="fa-solid fa-angle-down"></i>
                    </button>

                    <div class="collapse" id="subCategory">
                        <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                            href="{{ url('/application-form') }}">Application Form</a>
                        <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                            href="{{ url('/information-consent-form') }}">Informed Consent Form</a>
                        <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                            href="{{ url('/project-information-form') }}">Project Information Form</a>
                        <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                            href="{{ url('/checklist-form') }}">
                            Application Checklist</a>
                    </div>
                </div>

                <a class="list-group-item bg-transparent second-text" href="/app-status">App Status</a>

                <livewire:logout />

            </div>


        </div> --}}

        {{-- <div id="menu" class="p-3 collapse collapse-horizontal show"> --}}
        {{-- <a type="button"
                class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img style="width: 40%" src="img\logo6.png" alt="">
            </a>
            <hr class="text-white">

            <ul class="nav nav-pills flex-column mb-auto ">
                <li class="nav-item py-2">
                    @if (auth()->user()->role_id == 1)
                        <a href="{{ route('user-dashboard') }}" wire:navigate
                            class="{{ Route::is('user-dashboard') ? 'active' : '' }} nav-link text-white">Dashboard</a>
                    @endif
                    @if (auth()->user()->role_id == 0)
                        <a href="{{ route('admin-dashboard') }}" wire:navigate
                            class="{{ Route::is('admin-dashboard') ? 'active' : '' }} nav-link text-white">Dashboard</a>
                    @endif
                </li>

                <li id="toggle" class="nav-item py-2 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#form-collapse" aria-expanded="true">
                    <a type="button"
                        class="nav-link text-white d-flex align-items-center justify-content-between">Forms
                        <i id="arrow-icon" class="bi bi-chevron-down"></i></a>
                </li>

                <div class="collapse" id="form-collapse">
                    <ul class="nav nav-pills ps-4 flex-column">
                        <li class="nav-item py-2">
                            <a class="{{ Route::is('application-form') ? 'active' : '' }} nav-link sub-link text-white"
                                href="{{ route('application-form') }}" wire:navigate>Application Form</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="{{ Route::is('information-consent-form') ? 'active' : '' }}  nav-link sub-link text-white"
                                href="{{ route('information-consent-form') }}" wire:navigate>Informed
                                Consent Form</a>
                        </li>
                        <li class="nav-item py-2"><a
                                class="{{ Route::is('project-information-form') ? 'active' : '' }}  nav-link sub-link text-white"
                                href="{{ route('project-information-form') }}" wire:navigate>Project
                                Information Form</a>
                        </li>
                        <li class="nav-item py-2"> <a
                                class="{{ Route::is('checklist-form') ? 'active' : '' }} nav-link sub-link text-white"
                                href="{{ route('checklist-form') }}" wire:navigate>
                                Application Checklist</a></li>
                    </ul>
                </div>

                <li class="nav-item py-2"> <a class="{{ Route::is('app-status') ? 'active' : '' }} nav-link text-white"
                        href="{{ route('app-status') }}" wire:navigate>App Status</a></li>
                <li class="nav-item py-2">
                    <livewire:logout />
                </li>

            </ul>



            <hr class="text-white">
            <p class="lead text-center text-white m-0" style="font-size: 12px">Designed by Mirsolikh Usmonov</p> --}}


        {{-- </div> --}}
        <div style="min-height: 120px;" class="sidebar h-100 sticky-top">
            <div class="collapse collapse-horizontal h-100 show" id="menu">

                <livewire:sidebar />


            </div>
        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar border-bottom py-3" aria-label="example">
                <div class="container-fluid">
                    <div class="text-bg-white">
                        <h4 class="m-0"> <i class="bi bi-list " role="button" data-bs-toggle="collapse"
                                data-bs-target="#menu" aria-expanded="true" aria-controls="menu"></i>&nbsp
                            @yield('title')</h4>
                    </div>
                    <ul class="navbar-nav me-4">
                        <li class="nav-item">
                            <h5 class="m-0"><i class="bi bi-person-fill"></i>&nbsp{{ auth()->user()->name }}</h5>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="h-100 text-bg-light">
                {{ $slot }}
            </div>
        
        </div>
        

    </main>


    @livewireScripts

</body>

</html>

<!-- /#page-content-wrapper -->




<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


    * {
        font-family: 'Poppins',  sans-serif;
    }

    html,
    body {
        height: 100%;

    }

    main {
        height: 100%;
        overflow-y: auto;
    }

    .sidebar,
    .sidebar .card {
        background-color: #2D3142;
        height: 100%;
    }


    #page-content-wrapper {
        width: 100%;
        height: 100%;
    }
</style>
