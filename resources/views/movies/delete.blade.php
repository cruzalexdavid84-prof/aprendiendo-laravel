<x-main-layout>
    {{-- AHHHH el "el Movie del metodo despues se usa aca" --}}
    <x-slot:title>Eliminar la pelicula ::{{ $movie->title }}</x-slot:title>
    <h1 class="mb-3">Confirmacion necesaria para eliminar</h1>
    <p class="mb-3">Esta accion <b>no es reversible</b>, y requiere una confirmacion. </p>
    <p class="mb-3">A continuacion se muestran los datos de la pelicula.</p>

    <hr class="mb-3">

    <h2 class="mb-3">{{ $movie-> title}}</h2>

    <dl class="mb-3">
        <dt><b>Precio</b></dt>
        <dd>$ {{$movie->price}} </dd>
        <dt><b>Fecha de Estreno</b></dt>
        <dd>{{$movie->release_date}}</dd>
    </dl>
    <hr class="mb-3">
    <h3 class="mb-2">Sinopsis</h3>
    <div>{{$movie->synosis}}</div>

    <hr class="mb-3">
    <h2 class="mb-3">¿Seguro que queres eliminar la pelicula?</h2>
    <form action="{{ route('movies.destroy', ['id'=> $movie->movie_id]) }} " method="post">
        <button type="submit" class="btn btn-danger">Eliminar <span><b>Definitivamente <i>"{{$movie->title}}"</i> </b></span></button>
    </form>

</x-main-layout>