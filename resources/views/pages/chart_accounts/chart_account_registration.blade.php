@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-sitemap"></i> Cadastro de plano de contas
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('chart-account.index') }}"> Plano de contas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de plano de contas</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('chart-account.store') }}" novalidate>

                @csrf

                <div class="form-row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="exampleTypeMovement">Movimentação</label>
                        <select class="form-control" name="type" id="exampleTypeMovement" required>
                            <option></option>
                            <option value="Pagamentos">Pagamentos</option>
                            <option value="Recebimentos">Recebimentos</option>
                        </select>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecione o tipo de movimentação.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomName">Nome</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" placeholder="Nome da movimentação" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, digite a descrição.
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('chart-account.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
