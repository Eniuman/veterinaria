@extends('layouts.main')

@section('contenido')
    <div class="container mt5">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

@endsection
