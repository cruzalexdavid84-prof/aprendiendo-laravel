<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  {{ $title ?? '' }} :: DV Peliculas</title>
    <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- La funcion url() genera una ruta absoluta generada dinamicamente al recurso indicado -->
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= url('css/style.css') ?>"> <!-- Ver como referencia -->

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="<?= url('/') ?>">DV Peliculas</a> --}}<!-- Se cambio esto por la linea de abajo -->
                <a class="navbar-brand" href="<?= route('home') ?>">DV Peliculas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            {{-- 
                                request() es un helper de Laravel que nos retorna las instancia del objeto 
                                Request de la peticion.
                                Este objeto contiene "toda" la informacion relativa a la peticion.

                                Tiene un metodo is() que permite preguntar si el path de la ruta actual coincide
                            --}}
                            
                            <x-navlink to="home">Home</x-navlink><!-- Se cambio el "to" de todos esto porque se uso name "route" -->
                        </li>
                        <li class="nav-item">
                           
                            <x-navlink to="about">Nosotros</x-navlink>
                        </li>
                        <li class="nav-item">
                           
                            <x-navlink to="movies.index">Peliculas</x-navlink>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-2">

        {{-- Agregamos el mensaje de feedback que haya sido flasheado, si existe.
        Una forma de obtenerlo es con la funcion helper "session"
        --}}
        @if(session()->has('feedback.message'))
            <div class="alert alert-success">{!!session()->get('feedback.message')!!}</div>{{-- Otra forma de imprimir pero
             sin proteccion --}}
        @endif

        {{ $slot }}

        {{--
    Si necesitamos imprimir de otra manera, existe:
    e($slot) ";?>" aca se saco la apertura de php porque lo ve mal

    Para imprimir sin filtrar se hace lo siguiente:
    {!! $variable !!}
    --}}

    </main>
    <footer class="footer">
        <p>Da vinci &copy; 2026</p>
    </footer>
    <script src="<?= url('js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>