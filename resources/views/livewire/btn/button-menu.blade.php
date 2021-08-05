<li @if (static::$active)
class="active"
@else
class="last"
@endif 
wire:click="activated">

@yield('menuBoutton')

</li>
