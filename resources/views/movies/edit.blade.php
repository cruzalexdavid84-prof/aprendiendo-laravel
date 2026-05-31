<?php
/** @var \Iluminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Movie $movie */

?>
<x-main-layout>
    <x-slot:title>Editar la pelicula: {{$movie->title}}</x-slot:title>{{-- Esto lo paso como variable cuando llamo a la vista --}}

    <h1 class="mb-3">Editar</h1>

    {{-- El metodo any() retorna true si hubo algun mensaje de error --}}
    @if($errors->any())
        <div class="alert alert-danger mb-3">Hay errores en los datos del formulario. Por favor, revisalos y proba de nuevo</div>
    @endif

    <form action="{{ route('movies.update', ['id' => $movie->movie_id]) }}" method="post">{{-- Aca se cambio como se pasa esto --}}
        <div class="mb-2">
            <label for="title" class="form-label">Titulo:</label>
            <input 
                type="text" 
                id="title" name="title" 
                class="form-control @error('title') is-invalid @enderror"
                @error('title'){{--Se agrega la condicion para que solo afecte si pasa el error  --}}
                    aria-invalid="true"{{-- Esto es para accesibilidad --}}
                    aria-errormessage="error_title" {{-- Esto es para accesiblidad, tmb se agrego abajo --}}  
                @enderror
                value="{{ $movie->title }}" 
            >
            {{-- Se usa la funcion OLD para ayudar a completar al usuario la informacion --}}
            @if ($errors->has('title'))
                <div class="text-danger" id="error_title">{{$errors->first('title') }}</div>{{--Ver el ID de Error en ambos lados--}}
            @endif
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Precio:</label>
            <input 
                type="text" 
                id="price" 
                name="price" 
                class="form-control @error('price') is-invalid @enderror"
                @error('price'){{--Se agrega la condicion para que solo afecte si pasa el error  --}}
                    aria-invalid="true"{{-- Esto es para accesibilidad --}}
                    aria-errormessage="error_price" {{-- Esto es para accesiblidad, tmb se agrego abajo --}}  
                @enderror
                value="{{ $movie->price }}" 
            > 
            @error('price'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger" id="error_price">{{$message}}</div>                
            @enderror
        </div>
        
        <div class="mb-2">
            <label for="release_date" class="form-label">Fecha de estreno:</label>
            <input 
                type="date" 
                id="release_date" 
                name="release_date"
                class="form-control @error('release_date') is-invalid @enderror"
                @error('release_date'){--Se agrega la condicion para que solo afecte si pasa el error  --}}
                    aria-invalid="true"{{-- Esto es para accesibilidad --}}
                    aria-errormessage="error_date" {{-- Esto es para accesiblidad, tmb se agrego abajo --}}  
                @enderror 
                value="{{ $movie->release_date }}" 
            >
            @if ($errors->has('release_date'))
                <div class="text-danger" id="error_date">{{$errors->first('release_date') }}</div>{{-- Ver este metodo First --}}
            @endif
        </div>

        <div class="mb-2">
            <label for="synosis" class="form-label">Sinopsis:</label>
            <textarea 
                id="synosis" 
                name="synosis" 
                @error('synosis'){{--Se agrega la condicion para que solo afecte si pasa el error  --}}
                    aria-invalid="true"{{-- Esto es para accesibilidad --}}
                    aria-errormessage="error_synosis" {{-- Esto es para accesiblidad, tmb se agrego abajo --}}  
                @enderror
                class="form-control @error('synosis') is-invalid @enderror"
            > {{ $movie->synosis }} </textarea>
            @if ($errors->has('synosis'))
                <div class="text-danger" id="error_synosis">{{$errors->first('synosis') }}</div>{{-- Ver este metodo First --}}
            @endif
        </div>


        <div class="mb-2">
            <label for="cover" class="form-label">Portada:</label>
            <input 
                type="file" 
                id="cover" 
                name="cover" 
                class="form-control @error('cover') is-invalid @enderror"
            > {{--Aca no se puede poner un valor por defecto--}}
            @error('cover'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger">{{$message}}</div>                
            @enderror
        </div>
        

        <div class="mb-2">
            <label for="cover_description" class="form-label">Descripcion de portada:</label>
            <textarea id="cover_description" name="cover_description"  class="form-control @error('cover_description') is-invalid @enderror"> {{ $movie->cover_description}} </textarea>
            @error('cover_description'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger">{{$message}}</div>                
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>

</x-main-layout>