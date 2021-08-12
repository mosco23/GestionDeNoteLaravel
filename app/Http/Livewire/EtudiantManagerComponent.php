<?php

namespace App\Http\Livewire;

use App\Models\Etudiant;
use Livewire\Component;
use App\Models\Ue;

class EtudiantManagerComponent extends Component
{
    public $ueSelected;
    public $etudiant_id;
    public $nce;
    public $nom;
    public $prenoms;
    public $etudiants;

    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->nce = null;
        $this->nom = null;
        $this->prenoms = null;
        $this->etudiant_id = null;
        $this->etudiants = $this->getEtudiants();
    }

    public function getEtudiants()
    {
        return Ue::find($this->ueSelected)->etudiants->sortByDesc(['nom', 'prenoms', 'nce']);
    }

    public function updatedNce($nce)
    {
        $this->nce = $nce;
    }

    public function updatedNom($nom)
    {
        $this->nom = $nom;
    }

    public function updatedPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;
    }

    public function addEtudiant()
    {
        $id = Etudiant::updateOrCreate(
            [
                'id' => $this->etudiant_id,
            ],
            [
                'nce' => $this->nce,
                'nom' => $this->nom,
                'prenom' => $this->prenoms,
            ]
        )->id;

        Ue::find($this->ueSelected)->etudiants()->attach($id);
        $this->initialisation();
    }

    public function effacer($etudiant_id)
    {
        Etudiant::destroy(intval($etudiant_id));
        $this->etudiants = $this->getEtudiants();
    }

    public function modifier($etudiant_id)
    {
        $this->etudiant_id = $etudiant_id;
        $etudiant = Etudiant::find($etudiant_id);
        $this->nce = $etudiant->nce;
        $this->nom = $etudiant->nom;
        $this->prenoms = $etudiant->prenom;
    }

    public function render()
    {
        return view('livewire.etudiant-manager-component');
    }
}
