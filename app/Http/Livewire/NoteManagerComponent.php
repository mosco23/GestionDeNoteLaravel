<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Ecue,
    Etudiant,
    Evaluation,
    Mention,
    Niveau,
    Parcours,
    Semestre,
    Specialite,
    Ue
};

class NoteManagerComponent extends Component
{      
    /**
     * parcoursSelected
     *
     * @var integer : stocke l'id du parcours choisi
     */
    public $parcoursSelected;

    public $ecueSelected;
    public $tabNotes;
    
    /**
     * ecueToAdd
     *
     * @var mixed
     */
    public $ecueToAdd;
    
    /**
     * parcours
     *
     * @var array : stocke l'ensemble des parcours
     */
    public $parcours;  

    /**
     * ues
     *
     * @var array : stocke l'ensemble des UEs du parcours selectionn&eacute;
     */
    public $ues;
    
    /**
     * ecues
     *
     * @var array : stocke le.s ECUE.s de l'UE choisit
     */
    public $ecues;
    
    /**
     * etudiants
     *
     * @var array : stocke la liste de tous les etudiants
     */
    public $etudiants;


    public $tab;

    public function mount()
    {
        $this->parcoursSelected = null;
        $this->tabNotes = null;

        $this->parcours = Parcours::all();
        $this->ues = null;
        $this->ecues = null;
        $this->etudiants = null;
    }

    public function updatedParcoursSelected($value)
    {
        $this->parcoursSelected = $value;
        $this->etudiants = null;
        $this->ues = Parcours::find($value)->ues()->with('ecues')->get()->toArray();
        // $this->ues = Parcours::find($value)->ues()->with('ecues')->get()->toArray();
    }

    public function updatedEcueSelected( $ecue_id )
    {
        $this->ecueSelected = intVal($ecue_id);
    }

    public function updatedEcueToAdd($value)
    {
        $this->ecueToAdd = $value;
    }

    public function addEvaluation(){
        Evaluation::create([
            'ecue_id' => $this->ecueSelected,
            'libelle' => $this->ecueToAdd,
            'code' => "BLABLA"
        ]);
    }

    public function seeStudentsList( $ue_id )
    {
        $this->etudiants = Ue::find($ue_id)->etudiants()->get()->toArray();
        $this->ecues = Ue::find($ue_id)->ecues()->with('evaluations')->get()->toArray();
        // dd($this->ecues[0]['evaluations'])
    }

    public function updating($name, $note)
    {
        $data = explode(".", $name);
        if($data[0] == "tab"):
            $etudiant_id = $data[1];
            $evaluation_id = $data[2];
            Etudiant::find($etudiant_id)->evaluations()->attach(
                                                        $evaluation_id,
                                                        ['note' => $note]
                                                    );
        endif;
    }

    public function render()
    {
        return view('livewire.note-manager-component');
    }
}
