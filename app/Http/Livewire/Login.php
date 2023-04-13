<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;

    public function render()
    {
        return view('livewire.login')->extends('main')->section('main');
    }

    public function login()
    {

        $this->validate([
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:3|max:20'
        ]);

        $user = User::where('username', $this->username)->first();
        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                auth()->loginUsingId($user->id);
                session()->regenerate();
                redirect()->to('/');
            } else {
                session()->flash('error', 'password salah');
            }
        } else {
            session()->flash('error', 'username tidak ditemukan');
        }
    }
}
