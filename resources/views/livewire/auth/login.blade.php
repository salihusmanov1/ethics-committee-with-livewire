<div>
    <div class="logo">
        <h2 class="card-title text-center">Login</h2>
    </div>
    <div class="card-body py-md-4">
        <form wire:submit="LoginUser" action="">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @csrf
            <div class="form-group">
                <input wire:model="email" type="text" class="form-control" placeholder="Email" name="email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>


            <div class="form-group">
                <input wire:model="password" type="password" class="form-control" name="password"
                    placeholder="Password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="button d-flex flex-row align-items-center justify-content-between">
                <a style="padding-left: 5px" href="/register">Register</a>
                <button type="submit" id="submit"class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
