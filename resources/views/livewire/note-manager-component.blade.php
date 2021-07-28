<div class="container-fluid border">
    {{-- 
        When user choice a "parcours", ID of this "parcours" is automatically sended to this component controller thought $parcoursSelected property. At the update of this value, updatedParcoursSelected is called to continu the process. 
    --}}
    <select class="row col-11 mx-auto" wire:model="parcoursSelected">
        <option value="">-*-SELECTIONNER UN PARCOURS-*-</option>
        @foreach ($parcours as $item)
        <option value="{{ $item->id }}">
            {{ $item->code }}
        </option>
        @endforeach
    </select>

    <div class="row">
        {{-- 
            When a "parcours" is choice, $displayUes take true value for permit listing of UEs 
        --}}
        @if($displayUes)
        <div class="col-2">
            @include("NoteManagerPartials._listing-ues")
        </div>
        @endif
        {{-- 
            When a Ue or ecue is choice, $displayStudents take true value for permit listing of students 
        --}}
        @if($displayStudents)
        <div class="col-9 border p-2">
            @include("NoteManagerPartials._listing-etudiants")            
        </div>
        @endif
    </div>
</div>
