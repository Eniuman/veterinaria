@extends('layouts.main')

@section('contenido')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <h3 class="text-center mb-4">Registro de Usuario</h3>

        <form action="{{ route('registrar') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Crea una contraseña">
            </div>

            <button type="submit" class="btn btn-primary w-100">Registrar</button>

            <div class="text-center mt-3">
                <small>¿Ya tienes cuenta? 
                    <a href="{{ route('login') }}" class="text-success">Inicia sesión</a>
                </small>
            </div>
        </form>
    </div>
</div>
@endsection
