<?php

namespace App\Http\Livewire;

use App\Models\Ue;
use Livewire\Component;

class UeManagerComponent extends Component
{
    public $code;
    public $libelle;
    public $ues;


    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->code = null;
        $this->libelle = null;
        $this->ues = $this->getUes();
    }

    public function getUes()
    {
        return $this->ues = Ue::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addUe()
    {
        Ue::updateOrCreate([
                'code' => $this->code,
            ],
            [
                'code' => $this->code,
                'libelle' => $this->libelle
            ]
        );

        $this->initialisation();
    }

    public function effacer($ue_id)
    {
        Ue::destroy(intval($ue_id));
        $this->ues = $this->getUes();
    }

    public function modifier($ue_id)
    {
        $ue = Ue::find($ue_id);
        $this->code = $ue->code;
        $this->libelle = $ue->libelle;
    }

    public function render()
    {
        return view('livewire.ue-manager-component');
    }
}
