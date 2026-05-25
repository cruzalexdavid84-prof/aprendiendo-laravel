<x-main-layout>
    <x-slot:title>Publicar Peliculas</x-slot:title>

    <h1 class="mb-3">Publicar una nueva pelicula</h1>

    <form action="" method="post">
        <div class="mb-2">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Precio</label>
            <input type="text" id="price" name="price" class="form-control">
        </div>
        
        <div class="mb-2">
            <label for="release_date" class="form-label">Fecha de estreno</label>
            <input type="text" id="release_date" name="release_date" class="form-control">
        </div>


        <div class="mb-2">
            <label for="cover" class="form-label">Precio</label>
            <input type="text" id="cover" name="cover" class="form-control">
        </div>
        
        <div class="mb-2">
            <label for="cover_description" class="form-label">Fecha de estreno</label>
            <input type="text" id="cover_description" name="cover_description" class="form-control">
        </div>

        <div class="mb-2">
            <label for="release_date" class="form-label">Fecha de estreno</label>
            <textarea id="synosis" name="synosis" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>



    </form>

</x-main-layout>