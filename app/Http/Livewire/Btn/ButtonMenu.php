<?php

namespace App\Http\Livewire\Btn;

use Livewire\Component;

class ButtonMenu extends Component
{
    public bool $active;

    public function mount()
    {
        $this->active = false;
    }

    public function activated()
    {
        $this->active = true;
    }

    public function render()
    {
        return view('livewire.btn.button-menu');
    }
}
