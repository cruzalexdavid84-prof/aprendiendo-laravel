<x-main-layout>

    <x-slot:title>Ingresar a mi cuenta</x-slot:title>

    <h1>Ingresar a mi cuenta</h1>

    <form action="{{route('login.process')}}" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control">
            @if ($errors->has('email'))
                <div class="text-danger" id="error_email">{{$errors->first('email') }}</div>
            @endif{{-- Reever como funciona el tema de los errores --}}
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control">
            
            {{-- @if ($errors->has('password'))
                <div class="text-danger" id="error_password">{{$errors->first('password') }}</div>
            @endif --}}
            @error('password'){{-- Esto hace lo mismo que la version anterior, esta predefinido por Laravel --}}
                <div class="text-danger" id="error_password">{{$message}}</div>{{-- Message solo existe aca, no funciona en un if. --}}                
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</x-main-layout>
