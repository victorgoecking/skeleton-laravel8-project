@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Cadastro de produto
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de produto</li>
            </ol>
        </nav>
    </div>

    <form id="formProduct" class="needs-validation" method="POST" action="{{ route('product.store') }}" novalidate>
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-5 mb-3">
                        <label for="validationCustomName">Nome *</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" placeholder="Nome do produto" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o nome do produto.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="exampleFormControlDescription">Descrição</label>
                        <textarea class="form-control" name="description" id="exampleFormControlDescription" placeholder="Descrição do produto" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-dollar-sign"></i> Valores
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomCostValue">Valor de custo *</label>
                        <input type="text" class="form-control" name="product_cost_value" id="validationCustomCostValue" placeholder="0,00" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o valor de custo.
                        </div>
                    </div>
                </div>
{{--                <button id="addRowAddress" class="btn btn-dark" type="button"><i class="fas fa-plus-circle"></i> Inserir novo endereço </button>--}}

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-arrows-alt"></i> Pesos e dimensões
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="customWeight">Peso (Kg)</label>
                        <input type="text" class="form-control" name="weight" id="customWeight" placeholder="0,000">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="customWidth">Largura (m)</label>
                        <input type="text" class="form-control" name="width" id="customWidth" placeholder="0,000">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="customHeight">Altura (m)</label>
                        <input type="text" class="form-control" name="height" id="customHeight" placeholder="0,000">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="customLength">Comprimento (m)</label>
                        <input type="text" class="form-control" name="length" id="customLength" placeholder="0,000">
                    </div>
                </div>

                <div class="form-row mt-4">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                </div>
            </div>
        </div>


    </form>

@endsection
