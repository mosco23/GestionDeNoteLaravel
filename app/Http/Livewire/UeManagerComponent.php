<?php

namespace App\Http\Livewire;

use App\Models\Parcours;
use App\Models\Ue;
use Livewire\Component;

class UeManagerComponent extends Component
{
    public $parcour_id;
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
        $ues = Parcours::find($this->parcour_id)->ues()->get()->sortByDesc(['libelle']);
        return $ues;
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
        $id = Ue::updateOrCreate([
                'code' => $this->code,
            ],
            [
                'code' => $this->code,
                'libelle' => $this->libelle
            ]
        )->id;
        
        Parcours::find($this->parcour_id)->ues()->attach($id);
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
