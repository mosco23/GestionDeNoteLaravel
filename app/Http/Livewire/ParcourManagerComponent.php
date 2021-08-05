<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mention;
use App\Models\Niveau;
use App\Models\Parcours;
use App\Models\Semestre;
use App\Models\Specialite;
use App\Models\Annee;


class ParcourManagerComponent extends Component
{
    public $libelle;
    public $code;
    public $mentions;
    public $mentionSelected;
    public $semestres;
    public $semestreSelected;
    public $niveaux;
    public $niveauSelected;
    public $parcours;
    public $parcourSelected;
    public $specialites;
    public $specialiteSelected;


    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->code = null;
        $this->libelle = null;
        $this->parcourSelected = null;
        $this->mentionSelected = 1;
        $this->semestreSelected = 1;
        $this->niveauSelected = 1;
        $this->specialiteSelected = 1;
        $this->mentions = $this->getMentions();
        $this->semestres = $this->getSemestres();
        $this->niveaux = $this->getNiveaux();
        $this->specialites = $this->getSpecialites();
        $this->parcours = $this->getParcours();
    }


    public function getParcours()
    {
        return Parcours::all();
    }

    public function getSpecialites()
    {
        return $this->specialites = Specialite::all()->sortByDesc(['libelle']);
    }

    public function getMentions()
    {
        return $this->mentions = Mention::all()->sortByDesc(['libelle']);
    }

    public function getNiveaux()
    {
        return $this->niveaux = Niveau::all()->sortByDesc(['libelle']);
    }

    public function getSemestres()
    {
        return $this->semestres = Semestre::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function updatedMentionSelected($mentionSelected)
    {
        $this->mentionSelected = $mentionSelected;
    }

    public function updatedNiveauSelected($niveauSelected)
    {
        $this->niveauSelected = $niveauSelected;
    }

    public function updatedSemestreSelected($semestreSelected)
    {
        $this->semestreSelected = $semestreSelected;
    }

    public function updatedSpecialiteSelected($specialiteSelected)
    {
        $this->specialiteSelected = $specialiteSelected;
    }

    public function addParcour()
    {
        Parcours::updateOrCreate([
            'id' => $this->parcourSelected,
        ],
        [
            'code' => $this->code,
            'libelle' => $this->libelle,
            'niveau_id' => $this->niveauSelected,
            'mention_id' => $this->mentionSelected,
            'semestre_id' => $this->semestreSelected,
            'specialite_id' => $this->specialiteSelected,
        ]
    );

        $this->initialisation();
    }

    public function effacer($parcours_id)
    {
        Parcours::destroy(intval($parcours_id));
        $this->parcours = $this->getParcours();
    }

    public function modifier($parcours_id)
    {
        $parcours = Parcours::find($parcours_id);
        $this->code = $parcours->code;
        $this->libelle = $parcours->libelle;
        $this->mentionSelected = $parcours->mention_id;
        $this->semestreSelected = $parcours->semestre_id;
        $this->niveauSelected = $parcours->niveau_id;
        $this->parcourSelected = $parcours->id;
        $this->specialiteSelected = $parcours->specialite_id;
    }


    public function render()
    {
        return view('livewire.parcour-manager-component');
    }
}
