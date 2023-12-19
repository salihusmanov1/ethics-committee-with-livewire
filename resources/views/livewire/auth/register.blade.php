<div>
    <div class="logo">
        <h2 class="card-title text-center">Register</h2>
    </div>
    <div class="card-body py-md-4">
        <form wire:submit="CreateUser">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="form-group">
                <input wire:model="name" name="name" class="form-control" value="" id="name"
                    placeholder="Name">
                <span class="text-danger my-0 py-0">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <input wire:model="email" type="email" name="email" class="form-control" value=""
                    id="email" placeholder="Email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <input wire:model="password" type="password" name="password" class="form-control" value=""
                    id="password" placeholder="Password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <input wire:model="password_confirmation" type="password" class="form-control"
                    name="password_confirmation" placeholder="Confirm-password">
                <span class="text-danger">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-between">
                <a style="padding-left: 5px" href="/">Login</a>
                <button class="btn btn-primary">Create Account</button>
            </div>
        </form>
    </div>
</div>
