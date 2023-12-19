<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

use function Laravel\Prompts\password;

#[Layout('layout.auth')]
class Register extends Component
{
    #[Rule('required|min:3')]
    public $name = '';
    #[Rule('required|email|unique:users')]
    public $email = '';
    #[Rule('required|min:6|confirmed')]
    public $password = '';

    public $password_confirmation ='';

    public function CreateUser()
    {
        try {
            $this->validate();
            $this->password = Hash::make($this->password);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
    
            auth()->login($user);
    
            // return redirect()->route('dashboard')->with('message', 'Your account has been created');
    
            Session::flash('success', 'Register successful!');
            $this->reset('name', 'email', 'password', 'password_confirmation');
        }
        catch (\Exception $e){
            Session::flash('fail', 'Failed to register. Please try again.');
        }
    }



    public function render()
    {
        return view('livewire.auth.register');
    }
}
