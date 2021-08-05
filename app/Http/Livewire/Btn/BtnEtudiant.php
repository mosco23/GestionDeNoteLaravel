<?php

namespace App\Http\Livewire\Btn;

class BtnEtudiant extends ButtonMenu
{
    public function pages()
    {
        return redirect('livewire.etudiant-manager-component');
    }
}
