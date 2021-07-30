<ul class="container bg-dark text-white">
    @forelse ($ues as $k => $ue)
    <li>
        <div class="btn btn-primary">
            {{ $ue["code"] }}
        </div>
        
        <ul>
            @foreach ($ue["ecues"] as $kk => $ecue)
            <li
            class="btn btn-secondary" wire:click="listingStudents({{ $ue['id'] }}, {{ $ecue['id'] }} )"
            >
                {{ $ecue['libelle'] }}
            </li>
            @endforeach
        </ul>
    </li>
    @empty
        <h2>Ce parcours contient aucune UE pour le moment.</h2>
    @endforelse
</ul>