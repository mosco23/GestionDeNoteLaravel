<?php

namespace App\Http\Livewire;

use App\Models\Niveau;
use Livewire\Component;

class NiveauManagerComponent extends Component
{
    public $code;
    public $libelle;
    public $niveaux;


    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->code = null;
        $this->libelle = null;
        $this->niveaux = $this->getNiveaux();
    }

    public function getNiveaux()
    {
        return Niveau::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addNiveau()
    {
        Niveau::updateOrCreate([
            'code' => $this->code,
        ],
        [
            'code' => $this->code,
            'libelle' => $this->libelle
        ]
    );

        $this->initialisation();
    }

    public function effacer($niveau_id)
    {
        Niveau::destroy(intval($niveau_id));
        $this->niveaux = $this->getNiveaux();
    }

    public function modifier($niveau_id)
    {
        $niveau = Niveau::find($niveau_id);
        $this->code = $niveau->code;
        $this->libelle = $niveau->libelle;
    }


    public function render()
    {
        return view('livewire.niveau-manager-component');
    }
}
