@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user"></i> Detalhes do usuário
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"></i> Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do usuário</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="jumbotron text-center">
                <h1 class="display-4">{{ $user->name }}</h1>
                <p class="lead"><b>Nome de Usuário:</b> {{ $user->username }}</p>
                <p class="lead"><b>E-mail:</b> {{ $user->email }}</p>
                <p class="lead"><b>Observação:</b> {{ $user->note }}</p>
                <p class="lead"><b>Nivel:</b> {{ $user->level }}</p>
                <hr class="my-4">
                <p><b>Criado em:</b> {{ $user->created_at }}</p>
                <p class="lead">
                    <a class="btn btn-warning btn-lg" href="{{ route('user.edit', ['user' => $user->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </p>
            </div>
        </div>
    </div>
@endsection
