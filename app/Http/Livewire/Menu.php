<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.menu');
    }

    public function mentions()
    {
        return redirect(route('mentions'));
    }
}
