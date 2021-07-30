<div class="col-12 border p-3 m-2">
    <h2 class="container">GESTION DES EVALUATIONS</h2>
    <select wire:model="ecueSelected">
        <option value="">-*-SELECTIONNER UN ECUE-*-</option>
        @foreach ($ecues as $ecue)
        <option value="{{ $ecue['id'] }}">{{ $ecue['libelle'] }}</option>
        @endforeach
    </select>
    <input wire:model.lazy="ecueToAdd" type="text" placeholder="libelle">

    <button
    wire:click="addEvaluation"
    class="btn btn-primary text-white"
    >
        AJOUTER L'EVALUATION
    </button>
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
<table class="table shadow-lg p-3 mb-5 bg-white rounded">
    <thead>
        <tr>
            <th>Moyenne</th>
            <th rowspan="" colspan="">#</th>
            <th rowspan="" colspan="">NCE</th>
            <th rowspan="" colspan="">Nom</th>
            <th rowspan="" colspan="">Prenoms</th>
            @foreach ($ecues as $ecue)
            <th rowspan="">
                {{ $ecue['libelle'] }}
            </th>
            @endforeach
            <th>Moyenne</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="dont_see" rowspan="" colspan=""></td>
            <td class="dont_see" rowspan="" colspan=""></td>
            <td class="dont_see" rowspan="" colspan=""></td>
            <td class="dont_see" rowspan="" colspan=""></td>
            @forelse ($ecue['evaluations'] as $evaluation)
                <td>
                    {{ $evaluation['libelle'] }}
                </td>
            @empty
                
            @endforelse
            <td>
                <label>{{ $moyenne }}</label>
            </td>
        </tr>
        @foreach ($etudiants as $id => $etudiant)
        <tr>
            <td>{{ $id + 1 }}</td>
            <td>{{ $etudiant['nce'] }}</td>
            <td>{{ $etudiant['nom'] }}</td>
            <td>{{ $etudiant['prenom'] }}</td>
            @foreach ($ecues as $key => $ecue)
                {{-- <tr> --}}
                    @forelse($ecue['evaluations'] as $evaluation)
                    <td>
                        <input wire:model.lazy="tab.{{ $etudiant['id'] }}.{{ $evaluation['id'] }}" class="note" type="number">
                    </td>
                    @empty
                    
                    @endforelse
                    {{-- </tr> --}}
            @endforeach
        </tr>
        @endforeach  
    </tbody>
</table>