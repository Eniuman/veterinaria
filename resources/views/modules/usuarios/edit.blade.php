@extends('layouts.main')

@section('contenido')

<div class="container mt-4">
    <h2>Actualizar Estudiante</h2>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update', $item->id) }}" method="post">
                    @csrf 
                    @method('PUT')

                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control mb-2" required value="{{ $item->name }}">

                    <label for="email">Correo:</label>
                    <input type="email" name="email" id="email" class="form-control mb-2" required value="{{ $item->email }}">

                    <button type="submit" class="btn btn-warning mt-2">
                        <i class="fa-regular fa-pen-to-square"></i> Actualizar
                    </button>

                    <a href="{{ route('usuarios') }}" class="btn btn-danger mt-2">
                        <i class="fa-solid fa-ban"></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
