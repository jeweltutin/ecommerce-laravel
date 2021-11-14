<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccessDeniedComponent extends Component
{
    public function render()
    {
        return view('livewire.access-denied-component')->layout('layouts.base');
    }
}
