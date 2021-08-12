<?php

namespace App\Http\Livewire;

use App\Models\Semestre;
use Livewire\Component;

class SemestreManagerComponent extends Component
{
    public $code;
    public $libelle;
    public $semestres;
    public $semestre_id;


    public function mount()
    {
        $this->initialisation();
    }

    public function initialisation()
    {
        $this->code = null;
        $this->libelle = null;
        $this->semestres = $this->getSemestres();
    }

    public function getSemestres()
    {
        return Semestre::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addSemestre()
    {
        Semestre::updateOrCreate([
            'id' => $this->semestre_id,
        ],
        [
            'code' => $this->code,
            'libelle' => $this->libelle
        ]
    );

        $this->initialisation();
    }

    public function effacer($semestre_id)
    {
        Semestre::destroy(intval($semestre_id));
        $this->semestres = $this->getsemestres();
    }

    public function modifier($semestre_id)
    {
        $this->semestre_id = $semestre_id;
        $semestre = Semestre::find($semestre_id);
        $this->code = $semestre->code;
        $this->libelle = $semestre->libelle;
    }

    public function render()
    {
        return view('livewire.semestre-manager-component');
    }
}
