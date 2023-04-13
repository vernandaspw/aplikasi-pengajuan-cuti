<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar');
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        redirect()->to('login');
    }
}
