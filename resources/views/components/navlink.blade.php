<a
    class="nav-link {{ request()->routeIs($to) ? 'active' : '' }}"{{--Se agrego el metodo routeIS--}}
    {{ request()->routeIs($to) ? 'aria-current="page"' : '' }} href="{{route($to)}}">
    {{$slot}}
</a>