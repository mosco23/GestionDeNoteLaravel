<?php

namespace App\Http\Livewire;

use App\Models\Specialite;
use Livewire\Component;

class SpecialiteManagerComponent extends Component
{
    public $code;
    public $libelle;
    public $specialites;


    public function mount()
    {
        $this->code = null;
        $this->libelle = null;
        $this->specialites = $this->getSpecialites();
    }

    public function getSpecialites()
    {
        return Specialite::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addSpecialite()
    {
        specialite::updateOrCreate([
            'code' => $this->code,
        ],
        [
            'code' => $this->code,
            'libelle' => $this->libelle
        ]
    );

        $this->specialites = $this->getSpecialites();
        $this->code = null;
        $this->libelle = null;
    }

    public function effacer($specialite_id)
    {
        Specialite::destroy(intval($specialite_id));
        $this->specialites = $this->getSpecialites();
    }

    public function modifier($specialite_id)
    {
        $specialite = Specialite::find($specialite_id);
        $this->code = $specialite->code;
        $this->libelle = $specialite->libelle;
    }

    public function render()
    {
        return view('livewire.specialite-manager-component');
    }
}
