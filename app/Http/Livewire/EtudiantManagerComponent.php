<?php

namespace App\Http\Livewire;

use App\Models\Etudiant;
use Livewire\Component;

class EtudiantManagerComponent extends Component
{
    public $nce;
    public $nom;
    public $prenoms;
    public $etudiants;

    public function mount()
    {
        $this->nce = null;
        $this->nom = null;
        $this->prenoms = null;
        $this->etudiants = $this->getEtudiants();
    }

    public function getEtudiants()
    {
        return $this->etudiants = Etudiant::all()->sortByDesc(['nom', 'prenoms', 'nce']);
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
        Etudiant::updateOrCreate(
            [
                'nce' => $this->nce,
            ],
            [
                'nce' => $this->nce,
                'nom' => $this->nom,
                'prenom' => $this->prenoms,
            ]
    );

        $this->getEtudiants();
    }

    public function effacer($etudiant_id)
    {
        Etudiant::destroy(intval($etudiant_id));
        $this->etudiants = $this->getEtudiants();
    }

    public function modifier($etudiant_id)
    {
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
