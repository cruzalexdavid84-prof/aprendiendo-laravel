<?php
/** @var Iluminate\Support\ViewErrorBag $errors */

?>
<x-main-layout>
    <x-slot:title>Publicar Peliculas</x-slot:title>

    <h1 class="mb-3">Publicar una nueva pelicula</h1>

    {{-- El metodo any() retorna true si hubo algun mensaje de error --}}
    @if($errors->any())
        <div class="alert alert-danger mb-3">Hay errores en los datos del formulario. Por favor, revisalos y proba de nuevo</div>
    @endif

    <form action="{{ route('movies.store') }}" method="post">
        <div class="mb-2">
            <label for="title" class="form-label">Titulo:</label>
            <input type="text" id="title" name="title" class="form-control">
            @if ($errors->has('title'))
                <div class="text-danger">{{$errors->first('title') }}</div>{{-- Ver este metodo First --}}
            @endif
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Precio:</label>
            <input type="text" id="price" name="price" class="form-control">
            {{-- @if ($errors->has('price'))
                <div class="text-danger">{{$errors->first('price') }}</div>
            @endif --}}
            {{-- Otra forma de escribir los errores --}}
            @error('price'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger">{{$message}}</div>                
            @enderror
        </div>
        
        <div class="mb-2">
            <label for="release_date" class="form-label">Fecha de estreno:</label>
            <input type="text" id="release_date" name="release_date" class="form-control">
            @if ($errors->has('release_date'))
                <div class="text-danger">{{$errors->first('release_date') }}</div>{{-- Ver este metodo First --}}
            @endif
        </div>

        <div class="mb-2">
            <label for="synosis" class="form-label">Sinopsis:</label>
            <textarea id="synosis" name="synosis" class="form-control"></textarea>
            @if ($errors->has('synosis'))
                <div class="text-danger">{{$errors->first('synosis') }}</div>{{-- Ver este metodo First --}}
            @endif
        </div>


        <div class="mb-2">
            <label for="cover" class="form-label">Portada:</label>
            <input type="file" id="cover" name="cover" class="form-control">
            @error('cover'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger">{{$message}}</div>                
            @enderror
        </div>
        

        <div class="mb-2">
            <label for="cover_description" class="form-label">Descripcion de portada:</label>
            <textarea id="cover_description" name="cover_description" class="form-control"></textarea>
            @error('cover_description'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger">{{$message}}</div>                
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>

    </form>

</x-main-layout>