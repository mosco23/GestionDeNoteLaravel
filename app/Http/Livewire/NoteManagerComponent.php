<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Ecue,
    Etudiant,
    Evaluation,
};

class NoteManagerComponent extends Component
{      
    public $ecueSelected;
    public $notes;
    public $etudiants;
    public $evaluations;
    public $evaluationSelected;
    public $moyenne;
    public $libelle;

    public function mount() { $this->initialisation(); }

    public function render()
    {
        return view('livewire.note-manager-component');
    }

    public function initialisation() {
        $this->libelle = null;
        $this->etudiants = $this->getEtudiants();
        $this->evaluations = $this->getEvaluations();
    }

    public function getEtudiants()
    {
        $etudiants = Ecue::find($this->ecueSelected)->ue->etudiants->sortByDesc(['nom', "prenom", "nce"]);
        return $etudiants;
    }

    public function addEvaluation()
    {
        Evaluation::updateOrCreate(
            [
                'id' => $this->evaluationSelected,
            ],
            [
                'libelle' => $this->libelle,
                'ecue_id' => $this->ecueSelected
            ]
        );
        $this->initialisation();
    }

    public function effacer($evaluationSelected) 
    {
        Evaluation::destroy($evaluationSelected);
        $this->evaluations = $this->getEvaluations();
    }
    
    public function modifier($evaluationSelected)
    {
        $this->evaluationSelected = $evaluationSelected;
        $evaluation = Evaluation::find($evaluationSelected);
        $this->ecueSelected = $evaluation->ecue_id;
        $this->libelle = $evaluation->libelle;
    }

    public function updatedNotes($note, $etudiant_eval)
    {
        $etudiant_eval = explode(".", $etudiant_eval);
        $etudiant_id = intVal($etudiant_eval[0]);
        $evaluationSelected = intVal($etudiant_eval[1]);

        $this->moyenne = intval(DB::table('etudiant_evaluation')
            ->where('etudiant_id', $etudiant_id)
            ->avg('note'));
        
        Etudiant::find($etudiant_id)
            ->evaluations()
            ->attach($evaluationSelected, ['note' => $note]);



    }

    public function getEvaluations()
    {
        return Ecue::find($this->ecueSelected)->evaluations->sortByDesc(['libelle']);
    }
}
