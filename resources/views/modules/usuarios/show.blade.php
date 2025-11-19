@extends('layouts.main')

@section('contenido')

<div class="container mt-4">
    <h2>Mostrar Información de: {{ $item->name }}</h2>

    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">

                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('usuarios') }}" class="btn btn-info">
                    <i class="fa-solid fa-backward-step"></i> Regresar
                </a>

            </div>
        </div>
    </div>
</div>

@endsection
