<ul>
    @forelse ($ues as $k => $ue)
    <li
    wire:click="seeStudentsList( {{ $ue['id'] }} )"
    >
        {{ $ue['code'] }}
    </li>
    @empty
        <h2>Ce parcours contient aucune UE pour le moment.</h2>
    @endforelse
</ul>