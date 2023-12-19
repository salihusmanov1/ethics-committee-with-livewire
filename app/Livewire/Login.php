<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;


#[Layout('layout.auth')]
class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';
    #[Rule('required|min:5|max:12')]
    public $password = '';

    public function render()
    {
        return view('livewire.auth.login');
    }

    
    public function LoginUser() {
        $this->validate();

        if (auth()->attempt(array('email' => $this->email, 'password' => $this->password))) {
            if (auth()->user()->role_id == 0) {
                // return redirect()->route('admin-dashboard');
                Session::flash('success', 'Welcome to admin Dashboard!');
            } else {
                $this->reset('email', 'password');
                return redirect()->route('user-dashboard');
            }
        } else {
            return back()->with('fail', 'Password or email is wrong');
        }
    }

}
