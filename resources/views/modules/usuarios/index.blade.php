@extends('layouts/main')
@section('contenido')
<h2 class="text-primary">Gestion de Usuarios</h2>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <hr>

                    <table class="table table-sm text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Estado</th> 
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                {{--  Columna de Activar/Desactivar --}}
                                <td>
                                    <div class="d-flex align-items-center justify-content-center gap-2">

                                        <label class="switch m-0">
                                            <input type="checkbox" class="toggle-estado"
                                                data-id="{{ $item->id }}"
                                                {{ $item->activo ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>

                                        <span class="small">
                                            {{ $item->activo ? 'Activo' : 'Inactivo' }}
                                        </span>

                                    </div>
                                </td>

                                {{-- Acciones originales intactas --}}
                                <td>
                                    <form action="{{ route('destroy',$item->id) }}" method="post" class="m-0 p-0">
                                        @csrf 
                                        @method('DELETE')

                                        <a href="{{ route('show',$item->id) }}" class="btn btn-success btn-sm">
                                            Mostrar
                                        </a>

                                        <a href="{{ route('edit',$item->id) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5">No hay datos en la tabla</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end">
                        {{ $items->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
