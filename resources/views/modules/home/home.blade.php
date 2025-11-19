@extends('layouts.main')

@section('contenido')

    <div class="container mt5">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <h1 class="text-center text-primary">Bienvenido {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>

@endsection
