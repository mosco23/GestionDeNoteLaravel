<?php

namespace App\Http\Livewire;

use Illuminate\Database\QueryException;
use App\Models\Ecue;
use App\Models\Ue;
use Livewire\Component;

class EcueManagerComponent extends Component
{
    public $ueSelected;
    public $libelle;
    public $nbreCredit;
    public $ecues;
    public $ues;

    public function mount()
    {
        $this->ueSelected = Ue::all()->first();
        $this->nbreCredit = null;
        $this->libelle = null;
        $this->ecues = $this->getEcues();
        $this->ues = Ue::all();
    }

    public function getEcues()
    {
        return Ecue::all()->sortByDesc(['nom', 'prenoms', 'nce']);
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
        $this->ueSelected = Ue::find($ueSelected);
    }

    public function addEcue()
    {
        try {
            Ecue::updateOrCreate(
                [
                    'ue_id' => $this->ueSelected->id,
                ],
                [
                    'ue_id' => $this->ueSelected->id,
                    'libelle' => $this->libelle,
                    'nbreCredit' => $this->nbreCredit,
                ]
            );
    
            $this->ecues = $this->getEcues();
    
            $this->ueSelected = Ue::all()->first();
            $this->nbreCredit = null;
            $this->libelle = null;
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
        $ecue = Ecue::find($ecue_id);
        $this->libelle = $ecue->libelle;
        $this->nom = $ecue->nom;
        $this->nbreCredit = $ecue->nbreCredit;
        $this->ueSelected = $ecue->id;
    }

    public function render()
    {
        return view('livewire.ecue-manager-component');
    }
}
