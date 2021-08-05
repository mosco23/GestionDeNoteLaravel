<?php

namespace App\Http\Livewire;

use App\Models\Mention;
use Livewire\Component;

class MentionManagerComponent extends Component
{
    public $libelle;
    public $code;
    public $mentions;


    public function mount()
    {
        $this->code = null;
        $this->libelle = null;
        $this->mentions = $this->getMentions();
    }

    public function getMentions()
    {
        return $this->mentions = Mention::all()->sortByDesc(['libelle']);
    }

    public function updatedCode($code)
    {
        $this->code = $code;
    }

    public function updatedLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function addMention()
    {
        Mention::updateOrCreate([
            'code' => $this->code,
        ],
        [
            'code' => $this->code,
            'libelle' => $this->libelle
        ]
    );

        $this->mentions = $this->getMentions();
        $this->display = false;
        $this->code = null;
        $this->libelle = null;
    }

    public function effacer($mention_id)
    {
        Mention::destroy(intval($mention_id));
        $this->mentions = $this->getMentions();
    }

    public function modifier($mention_id)
    {
        $metion = Mention::find($mention_id);
        $this->code = $metion->code;
        $this->libelle = $metion->libelle;
    }

    public function render()
    {
        return view('livewire.mention-manager-component');
    }
}
