<div>
    <div class="logo">
        <h2 class="card-title text-center text-white">Ethics Committee <br> Login Form</h2>
    </div>
    <div class="card-body py-md-4">
        <form wire:submit.prevent="LoginUser">
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
            <div class="form-floating">
                <input wire:model.live="email" type="email" id="floatingInput"
                    class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="Email" name="email">
                <label for="floatingInput">Email</label>
                <p class="px-2 text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
            </div>


            <div class="form-floating">
                <input wire:model.live="password" id="floatingPassword" type="password"
                    class="form-control form-control-sm {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <p class="px-2 text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="button d-flex flex-row align-items-center justify-content-between">
                <a style="padding-left: 5px" type="button" href="/register">Register</a>
                <button type="submit" id="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
