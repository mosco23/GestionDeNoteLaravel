<div class="col-12 border p-3 m-2">
    <div class="row">
        <div class="col-12">
            <h2>
                GESTION DES EVALUATIONS
            </h2>
        </div>
        <div class="col-6">
            <h5>
                Ajouter une evaluation a l'ECUE : {{ $ecue->libelle }}
            </h5>
            <input wire:model.lazy="newEval" type="text" placeholder="LIBELLE">
        
            <button
            wire:click="addEvaluation"
            class="btn btn-primary text-white"
            >
                AJOUTER
            </button>
        </div>
        <div class="col-6">
            <h5>
                Annuler une evaluation de l'ECUE : {{ $ecue->libelle }}
            </h5>
            <select wire:model.lazy="removeEval">
                <option value="">-*-CHOIX D'UNE EVALUATION-*-</option>
                @forelse ($evaluations as $eval)
                    <option value="{{ $eval->id }}">{{ $eval->libelle }}</option>
                @empty
                    <option value="">-*-Nothing to see here-*-</option>
                @endforelse
            </select>
        
            <button
            wire:click="removeEvaluation"
            class="btn btn-primary text-white"
            >
                SUPPRIMER
            </button>
        </div>
    </div>
</div>

<style>
    th {
        text-align: center;
    }
    table,
    td {
        border: 1px solid #333;
    }
    td input.note {
        background-color: lightgrey;
    }

    td input.note:focus {
        background-color: red;
    }

    thead,
    tfoot,
    .dont_see {
        background-color: #333;
        color: #fff;
    }
    /* table td input {
        position: absolute;
        display: block;
        top:0;
        left:0;
        margin: 0;
        height: 100%;
        width: 100%;
        border: none;
        padding: 10px;
        box-sizing: border-box;
        }  */
</style>

<table class="container">
    <thead>
        <tr>
            <th rowspan="" colspan="">ID</th>
            <th rowspan="" colspan="">NCE</th>
            <th rowspan="" colspan="">Nom</th>
            <th rowspan="" colspan="">Prenoms</th>
            @forelse ($evaluations as $eval)
             <th>{{ $eval->libelle }}</th>
            @empty
                <th>Aucune evaluation pour l'heure</th>
            @endforelse

            @if (!empty($evaluations))
                <th  rowspan="" colspan="" class="text-danger">Moyennes</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($etudiants as $id => $etudiant)
        <tr>
            <td>{{ $etudiant->id }}</td>
            <td>{{ $etudiant->nce }}</td>
            <td>{{ $etudiant->nom }}</td>
            <td>{{ $etudiant->prenom }}</td>
            @forelse ($evaluations as $eval)
            <td>
                <input class="w-100"
                    type="number" 
                    wire:model.lazy="notes.{{ $etudiant->id }}.{{ $eval->id }}"
                    @if($etudiant->evaluations->find($eval->id) != null)
                    placeholder="{{ $etudiant->evaluations->find($eval->id)->pivot->note }}"
                    @endif
                >
            </td>
            @empty
            <td></td>
            @endforelse
            <td wire:model="moyenne">
                <label class="btn btn-success w-100"  for="moyenne">{{ var_dump($moyenne) }}</label>
            </td>
    
        </tr>
        @empty
            <h3>
                Aucun etudiant d'inscrire.
            </h3>
        @endforelse  
    </tbody>
</table>