@extends('layouts.main')

@section('contenido')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <h3 class="text-center mb-4">Login de Usuario</h3>
        <form action="{{ route('logear') }}" method="POST">
            @csrf
            @method('POST')
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa un correo">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu Contraseña">
        </div>

        <button type="submit" class="btn btn-success w-100">Ingresar</button>
        
        </form>
    </div>
</div>

@endsection
