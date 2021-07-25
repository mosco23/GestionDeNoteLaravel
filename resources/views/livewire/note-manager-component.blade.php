<div class="row">
    <select class="col-11 mx-auto" wire:model="parcoursSelected">
        <option value="">-*-SELECTIONNER UN PARCOURS-*-</option>
        @foreach ($parcours as $item)
        <option value="{{ $item->id }}">
            {{ $item->code }}
        </option>
        @endforeach
    </select>

    @if ($ues)
        <div class="col-2">
            @include("NoteManagerPartials._listing-ues")
        </div>
    @endif

    @if ($etudiants)
        <div class="col-9 border p-2">
            @include("NoteManagerPartials._listing-etudiants")            
        </div>
    @endif
</div>
