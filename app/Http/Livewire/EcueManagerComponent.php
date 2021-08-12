<?php

namespace App\Http\Livewire;

use Illuminate\Database\QueryException;
use App\Models\Ecue;
use App\Models\Ue;
use Livewire\Component;

class EcueManagerComponent extends Component
{
    public $ecue_id;
    public $ueSelected;
    public $libelle;
    public $nbreCredit;
    public $ecues;
    public $ues;

    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->ecues = $this->getEcues();
        $this->nbreCredit = null;
        $this->libelle = null;
    }

    public function getEcues()
    {
        $ecues = Ue::find($this->ueSelected)->ecues()->get()->sortByDesc(['libelle']);
        return $ecues;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function updatedNbreCredit($nbreCredit)
    {
        $this->nbreCredit = $nbreCredit;
    }

    public function updatedUeSelected($ueSelected)
    {
        $this->ueSelected = Ue::find($ueSelected)->id;
    }

    public function addEcue()
    {
        try {
            Ecue::updateOrCreate(
                [
                    'id' => $this->ecue_id,
                ],
                [
                    'ue_id' => $this->ueSelected,
                    'libelle' => $this->libelle,
                    'nbreCredit' => $this->nbreCredit,
                ]
            );

            $this->initialisation();

        } catch (QueryException $e) {
            
        }
    }

    public function effacer($ecue_id)
    {
        Ecue::destroy(intval($ecue_id));
        $this->ecues = $this->getEcues();
    }

    public function modifier($ecue_id)
    {
        $this->ecue_id = $ecue_id;
        $ecue = Ecue::find($this->ecue_id);
        $this->libelle = $ecue->libelle;
        $this->nom = $ecue->nom;
        $this->nbreCredit = $ecue->nbreCredit;
        $this->ueSelected = $ecue->ue()->id;
    }

    public function render()
    {
        return view('livewire.ecue-manager-component');
    }
}
