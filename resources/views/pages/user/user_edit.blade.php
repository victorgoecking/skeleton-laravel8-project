@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Edição de usuário
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"> Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edição de usuário</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('user.update', ['user' => $user->id]) }}" novalidate>

                @csrf
                @method('put')

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomName">Nome</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" value="{{ $user->name }}" placeholder="Nome Completo" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, digite seu nome.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomEmail">E-mail</label>
                        <input type="email" class="form-control" name="email" id="validationCustomEmail" aria-describedby="emailHelp" value="{{ $user->email }}" placeholder="Ex.: email@email.com" required>
                        <div class="invalid-feedback">
                            Por favor, providencie um e-mail valido.
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomUsername">Nome de usuário</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" name="username" id="validationCustomUsername" value="{{ $user->username }}" placeholder="Que será usado para entrar no sistema" aria-describedby="inputGroupPrepend" required><div class="invalid-feedback">Por favor, escolha um nome de usuário.</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomPassword">Senha</label>
                        <input type="password" class="form-control" name="password" id="validationCustomPassword" placeholder="Mínimo de 8 caracteres">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlSelect1">Nível de acesso</label>
                        <select class="form-control" name="level" id="exampleFormControlSelect1">
                            <option value="1" {{ $user->level == 1 ? 'selected': '' }}>Atendente</option>
                            <option value="2" {{ $user->level == 2 ? 'selected': '' }}>Administrador</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlTextarea1">Observações</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" placeholder="Observações" rows="3">{{ $user->note }}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i> Atualizar</button>
                    <a href="{{ route('user.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
