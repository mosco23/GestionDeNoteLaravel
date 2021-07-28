<ul>
    @forelse ($ues as $k => $ue)
    <li>
        {{ $ue["code"] }}
        <ul>
            @foreach ($ue["ecues"] as $kk => $ecue)
            <li
                wire:click="listingStudents({{ $ue['id'] }}, {{ $ecue['id'] }} )"
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