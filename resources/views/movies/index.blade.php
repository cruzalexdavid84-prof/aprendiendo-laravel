{{-- Para usar un componente que hayamos creado en Laravel (por defecto, que 
 e ste en la carpeta de [resources/views/component/]) Debemos llamarlo usando su sintaxis 
 de "etiqueta":

    <x-component></x-component>

Todos los componentes de Laravel deben prefijarse con el "X-"

El nombre del componente debe ser el nombre del archivo dentro de la carpeta [resources/views/components/] sin la extension.

Pr. ejemplo, si la ruta es:

    resources/views/components/saraza.blade.php_check_syntax

    El componente lo incluimos:

    <x-saraza></x-saraza>

--}}



<x-main-layout>


    <x-slot:title>Listado de Peliculas </x-slot:title>
    <h1 class="mb-2">Nuestras Peliculas</h1>
    <p>Aca vas a encontrar la mejor seleccion de Peliculas</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Fecha de Estreno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($movies as $movie)
            <tr>
                <td>{{$movie->title}}</td>
                <td>{{$movie->price}} </td>
                <td>{{$movie->release_date}}</td>
                <td>Coming soon</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-main-layout>