<x-main-layout>
    <x-slot:title>{{ $movie->title }}</x-slot:title>
    <h1 class="mb-3">{{ $movie-> title}}</h1>

    <div>
        {{-- Ek link simbolico "Symlink" es usa porque no se puede acceder a Storage en un hosteo normal --}}
        {{-- La fachada de "Storage" nos permite interactuar con el servicio del File System
        Contiene metodos para poder hacer todos los manejos tradicionales en un file system:
        exists(), url(), (obtiene la url del recurso), etc. --}}
        {{-- Se tuvo que agregar el ":8000" 
        IMPORTANTE: a diferencia del metodo url() de laravel, que detecta automaticamente la ruta raiz del dominio 
        para generar los links, el metodo \Storage::url() necesita que el indiquemos "manualmente" cual es la ruta raiz del dominio.
        Esta ruta se define en el [.env] en la clave "APP_URL" --}}
        @if($movie->cover !== null && \Storage::exists($movie->cover)) {{-- ACa tmb pregunta por si existe el symlink --}}
            <img src="{{ \Storage::url($movie->cover) }}" alt="{{ $movie->cover_description }}">{{--Usa el symlink para buscar 
            la imagen  --}}
        
        @endif
        
    </div>

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