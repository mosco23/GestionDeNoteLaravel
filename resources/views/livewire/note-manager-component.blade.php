<div class="container-fluid border">
    {{-- 
        When user choice a "parcours", ID of this "parcours" is automatically sended to this component controller thought $parcoursSelected property. At the update of this value, updatedParcoursSelected is called to continu the process. 
    --}}
    <div class="row">
        <select class="btn mt-3 h-75 col-5" wire:model="parcoursSelected">
            <option value="">-*-SELECTIONNER UN PARCOURS-*-</option>
            @foreach ($parcours as $item)
            <option value="{{ $item->id }}">
                {{ $item->code }}
            </option>
            @endforeach
        </select>
        @if($displayUes)
        <div class="col-6 mr-1">
            @include("NoteManagerPartials._listing-ues")
        </div>
        @endif

    </div>
    

    <div class="row">
        {{-- 
            When a "parcours" is choice, $displayUes take true value for permit listing of UEs 
        --}}
        
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
