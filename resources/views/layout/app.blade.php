<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/js/main.js"></script>
    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="/fonts/fontawesome-free-6.4.0-web/css/all.css" />

    {{-- Jquery Datatable --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.1/fh-3.4.0/r-2.5.0/sp-2.2.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.1/fh-3.4.0/r-2.5.0/sp-2.2.0/datatables.min.js"></script>
    <link rel="stylesheet" href="/css/navigation.css">



</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center primary-text fs-3 fw-bold text-uppercase border-bottom">
                Dashboard
            </div>
            <div class="list-group list-group-flush my-3">
                @if (auth()->user()->role_id == 1)
                    <a wire:navigate href="/user-dashboard" class="list-group-item bg-transparent second-text">Home</a>
                @endif
                {{-- @if (auth()->user()->role_id == 0)
                    <a href="{{ route('admin-dashboard') }}" class="list-group-item bg-transparent second-text">Home</a>
                @endif --}}
                <div>
                    <button id="btn" class="list-group-item bg-transparent second-text" data-bs-toggle="collapse"
                        data-bs-target="#subCategory" aria-expanded="false" aria-controls="subCategory"
                        class="collapse list-group-item bg-transparent second-text">Forms 
                        <i id="icon" class="fa-solid fa-angle-down"></i>
                    </button>

                    <div class="collapse" id="subCategory">
                        <a wire:navigate style="padding-left: 50px"
                            class="list-group-item bg-transparent second-text" href="/information-consent-form">Informed Consent Form</a>
                        <a wire:navigate style="padding-left: 50px"
                            class="list-group-item bg-transparent second-text" href="/application-form">Application Form</a>
                        <a wire:navigate style="padding-left: 50px"
                            class="list-group-item bg-transparent second-text" href="/project-information-form">Project Information Form</a>
                        <a wire:navigate style="padding-left: 50px"
                            class="list-group-item bg-transparent second-text" href="/checklist-form">
                            Application Checklist</a>
                    </div>
                </div>

                <a wire:navigate class="list-group-item bg-transparent second-text" href="/app-status">App Status</a>

                <a href="" class="list-group-item bg-transparent second-text">Log Out</a>

            </div>


        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg bg-transparent py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">@yield('title')</h2>
                </div>


                <ul class="username navbar-nav ms-auto mb-2 mb-lg-0">
                    <li>
                        <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                    </li>
                </ul>
            </nav>
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>

<!-- /#page-content-wrapper -->


<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };

    document.addEventListener("DOMContentLoaded", function() {
        var subcategory = document.querySelector(".subcategory");
        var subBtn = document.querySelector(".sub-btn");
        var icon = document.querySelector("#icon");

        subBtn.addEventListener("click", function() {
            if (subcategory.style.maxHeight) {
                subcategory.style.maxHeight = null;
            } else {
                subcategory.style.maxHeight = subcategory.scrollHeight + "px";
            }
        });
    });
</script>
