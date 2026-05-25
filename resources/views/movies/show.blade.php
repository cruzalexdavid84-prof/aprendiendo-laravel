<x-main-layout>
    <x-slot:title>{{ $movie->title }}</x-slot:title>
    <h1 class="mb-3">{{ $movie-> title}}</h1>

    <dl class="mb-3">
        <dt><b>Precio</b></dt>
        <dd>$ {{$movie->price}} </dd>
        <dt><b>Fecha de Estreno</b></dt>
        <dd>{{$movie->release_date}}</dd>
    </dl>
    <hr class="mb-3">
    <h2 class="mb-2">Sinopsis</h2>
    <div>{{$movie->synosis}}</div>

</x-main-layout>