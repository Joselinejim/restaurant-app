@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Bienvenido, Administrador</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4>Total Usuarios</h4>
                <p>{{ \App\Models\User::count() }}</p>
            </div>
        </div>
    </div>
@endsection
