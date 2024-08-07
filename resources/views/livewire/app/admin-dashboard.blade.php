<div>
    @section('title', $pageName)
    <div class="text-bg-light">
        <div class="container py-3">
            <div class="g-3">
                <div>
                    <div class="card shadow-sm mb-4">
                        <div class="card-header main-color-bg text-white">
                            <h3 class="card-title ">Overview</h3>
                        </div>
                        <div class="card-body d-flex row">
                            <div class="col-md-4">
                                <div class="card text-bg-light">
                                    <div class="card-body text-center">
                                        <h4><i class="bi bi-list-ul"></i> {{ $newApps }} </h4>
                                        <h4>New Request</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-bg-light">
                                    <div class="card-body text-center">
                                        <h4><i class="bi bi-check-circle"></i> {{ $approvedApps }} </h4>
                                        <h4>Approved</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-bg-light">
                                    <div class="card-body text-center">
                                        <h4><i class="bi bi-clock"></i> {{ $pendingApps }}</h4>
                                        <h4>Pending</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header main-color-bg text-white">Latest Users</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .main-color-bg {
            background-color: #2D3142 !important;
            color: #ffffff !important;
        }

        /* wells */
        .dash-box {
            text-align: center;
        }
    </style>
</div>
