@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-cubes"></i> Cadastro de produto
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

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomName">Nome do produto*</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" placeholder="Nome do produto" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o nome do produto.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlDescription">Descrição</label>
                        <textarea class="form-control" name="description" id="exampleFormControlDescription" placeholder="Descrição do produto" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-dollar-sign"></i> Valores
            </div>
            <div class="card-body">
                <div class="form-row mb-3">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustomProductCostValue">Valor de custo *</label>
                        <input type="text" class="form-control" name="product_cost_value" id="validationCustomProductCostValue" placeholder="0,00" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o valor de custo.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="fa fa-info"></i>&nbsp;&nbsp;
                            O valor de venda é a valoração monetária dos produtos comercializados pelo estabelecimento. Ele pode ser calculado ou indicado livremente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-row mb-2">
                    <div class="col-md-12">
                        <button type="button" id="buttonCalculateSalesValueProduct" class="btn btn-primary"><i class="fas fa-calculator"></i>&nbsp;&nbsp;Calcular valor de venda</button>
                    </div>
                </div>

                <div class="form-row">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Lucro sugerido automaticamente (%)</th>
                            <th scope="col">Porcentagem de lucro utilizado (%)</th>
                            <th id="titleSuggestedSalesValue" scope="col">Valor de venda sugerido (R$)</th>
                            <th class="table-" scope="col">Valor de venda utilizado (R$)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">50%</th>
                            <td><input type="text" class="form-control text-dark" name="profit_percentage" id="profitPercentage" placeholder="0,00"></td>
                            <td id="suggestedSalesValue">0,00</td>
                            <td class="bg-warning"><input type="text" class="form-control  font-weight-bold" name="sales_value_product_used" id="salesValueProductUsed" placeholder="0,00"></td>
                        </tr>
                        </tbody>
                    </table>
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
                    <div class="col-md-3 mb-3">
                        <label for="customWeight">Peso (Kg)</label>
                        <input type="text" class="form-control" name="weight" id="customWeight" placeholder="0,000">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customWidth">Largura (m)</label>
                        <input type="text" class="form-control" name="width" id="customWidth" placeholder="0,000">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customHeight">Altura (m)</label>
                        <input type="text" class="form-control" name="height" id="customHeight" placeholder="0,000">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="customLength">Comprimento (m)</label>
                        <input type="text" class="form-control" name="length" id="customLength" placeholder="0,000">
                    </div>
                </div>

                <div class="form-row mt-4">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('product.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>


    </form>

@endsection

@section('scriptPages')
    <script src="{{ asset('admin/js/product.js')}}"></script>
@endsection
