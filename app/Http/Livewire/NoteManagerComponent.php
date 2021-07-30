<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Ecue,
    Etudiant,
    Evaluation,
    Parcours,
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
    
    /**
     * ecueSelected
     *
     * @var integer : stocke l'id de l'ecue choisi
     */
    public $ecueSelected;

    public $inputClass;
        
    /**
     * notes
     *
     * @var array 
     */
    public $notes;
    
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
     * ecue
     *
     * @var mixed
     */
    public $ecue;
    
    /**
     * etudiants
     *
     * @var array : stocke la liste de tous les etudiants
     */
    public $etudiants;

    public $evaluations;

    public $moyenne = 0;

    public $displayUes;
    public $displayStudents;

    public $newEval;
    public $removeEval;

    public function mount() { $this->resetMode(); }

    public function render()
    {
        return view('livewire.note-manager-component');
    }

    public function resetMode() {
        $this->parcoursSelected = null;
        $this->tabNotes = null;

        $this->parcours = Parcours::all();
        $this->ues = null;
        $this->ecues = null;
        $this->etudiants = null;

        $this->displayUes = null;
        $this->displayStudents = null;

        $this->newEval = null;
        $this->removeEval = null;
    }

    public function updatedParcoursSelected($parcours_id)
    {
        // clear listing students if exist
        if($this->displayStudents) { $this->displayStudents = false; }
        
        $this->parcoursSelected = intVal($parcours_id);
        $this->ues = Parcours::find($this->parcoursSelected)
            ->ues()
            ->with("ecues")
            ->get()
            ->toArray();

        $this->displayUes = true;
    }

    public function listingStudents( $ue_id, $ecue_id )
    {
        $this->etudiants = Ue::find($ue_id)
            ->etudiants()
            ->get();
        $this->ecue = Ecue::find($ecue_id);
        $this->evaluations = $this->ecue->evaluations()->get();
        $this->displayStudents = true;
    }

    public function updatedEcueSelected( $ecue_id )
    {
        $this->ecueSelected = intVal($ecue_id);
    }

    public function updatedNewEval($value) { $this->newEval = $value; }

    public function updatedRemoveEval($value) { $this->removeEval = $value; }

    public function addEvaluation()
    {
        Evaluation::create([
            'ecue_id' => $this->ecue->id,
            'libelle' => $this->newEval,
        ]);
        $this->getEvaluations();
        $this->newEval = null;
    }

    public function removeEvaluation() 
    {
        Evaluation::find($this->removeEval)->delete();
        $this->getEvaluations();
        $this->removeEval = null; 
    }

    public function updatedNotes($note, $etudiant_eval)
    {
        $etudiant_eval = explode(".", $etudiant_eval);
        $etudiant_id = intVal($etudiant_eval[0]);
        $evaluation_id = intVal($etudiant_eval[1]);

        $this->moyenne = intval(DB::table('etudiant_evaluation')
            ->where('etudiant_id', $etudiant_id)
            ->avg('note'));
        
        Etudiant::find($etudiant_id)
            ->evaluations()
            ->attach($evaluation_id, ['note' => $note]);



    }



    public function getEvaluations()
    {
        return $this->evaluations = $this->ecue->evaluations()->get();
    }
}
