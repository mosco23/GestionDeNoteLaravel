<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annee;

class AnneeManagerComponent extends Component
{
    public $libelle;
    public $annee_id;
    public $annees;


    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->libelle = null;
        $this->annee_id = null;
        $this->annees = $this->getAnnees();
    }

    public function viewParcours()
    {
        return redirect("livewire.parcour-manager-component", ['annee_id' => $this->annee_id]);
    }

    public function getAnnees()
    {
        return $this->annees = Annee::all()->sortByDesc(['libelle']);
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addAnnee()
    {
        Annee::updateOrCreate(
            [
                'id' => $this->annee_id,
            ],
            [
                'libelle' => $this->libelle
            ]
        );

        $this->initialisation();
    }

    public function effacer($annee_id)
    {
        Annee::destroy(intval($annee_id));
        $this->annees = $this->getAnnees();
    }

    public function modifier($annee_id)
    {
        $annee = Annee::find($annee_id);
        $this->libelle = $annee->libelle;
        $this->annee_id = $annee->id;
    }


    public function render()
    {
        return view('livewire.annee-manager-component');
    }
}
