<div>
    <div class="card h-100 rounded-0 border-0 p-3" style="width: 240px;">
        @persist('image')
            <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto">

                <img style="width: 40%" src="/img/logo6.png" alt="">

            </div>
        @endpersist
        <div class="card-body p-0">
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

                <div class="{{ Route::is(['application-form', 'information-consent-form', 'project-information-form', 'checklist-form']) ? 'show' : '' }} collapse"
                    id="form-collapse">
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

        </div>
    </div>

    <style>
        #toggle #arrow-icon {
            transition: 0.5s;
        }

        #toggle:not(.collapsed) #arrow-icon {
            transform: rotate(-180deg);
        }

        #toggle.collapsed #arrow-icon {
            transform: rotate(0deg);
        }
    </style>
</div>
