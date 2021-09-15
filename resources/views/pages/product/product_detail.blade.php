@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user"></i> Detalhes do produto
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Produto</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do produto</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> Dados Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="weightsAndDimensions-tab" data-toggle="tab" href="#weightsAndDimensions" role="tab" aria-controls="weightsAndDimensions" aria-selected="false"><i class="fas fa-arrows-alt"></i> Pesos e dimensões</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="costsAndValues-tab" data-toggle="tab" href="#costsAndValues" role="tab" aria-controls="costsAndValues" aria-selected="false"><i class="fas fa-fw fa-dollar-sign"></i>Custos e valores</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Nome do produto</th>
                            <td class="border-top-0" colspan="1">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Descrição</th>
                            <td class="border-top-0" colspan="1">{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado por</th>
                            <td class="border-top-0" colspan="1">{{ $product->user->first()->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado em</th>
                            <td class="border-top-0" colspan="1">{{ $product->created_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Modificado em</th>
                            <td class="border-top-0" colspan="1">{{ $product->updated_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>

                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('product.edit', ['product' => $product->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="tab-pane fade" id="weightsAndDimensions" role="tabpanel" aria-labelledby="weightsAndDimensions-tab">


                    <table class=" border-top-0 mt-0 table table-bordered">
                        <thead>
                        <tr>
                            <th class="border-top-0" colspan="2"><i class="fas fa-arrows-alt"></i> Pesos e dimensões</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Peso</th>
                            <td class="border-top-0" colspan="1">{{ $product->weight }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Largura</th>
                            <td class="border-top-0" colspan="1">{{ $product->width }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Altura</th>
                            <td class="border-top-0" colspan="1">{{ $product->height }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Comprimento</th>
                            <td class="border-top-0" colspan="1">{{ $product->length }}</td>
                        </tr>

                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('product.edit', ['product' => $product->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="tab-pane fade" id="costsAndValues" role="tabpanel" aria-labelledby="costsAndValues-tab">
                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Valor de custo</th>
                            <td class="border-top-0" colspan="1">{{ $product->product_cost_value }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Valor de venda</th>
                            <td class="border-top-0" colspan="1">{{ $product->sales_value_product_used }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Porcentagem de lucro</th>
                            <td class="border-top-0" colspan="1">{{ $product->profit_percentage }} %</td>
                        </tr>

                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('product.edit', ['product' => $product->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

            </div>
        </div>
    </div>

@endsection
