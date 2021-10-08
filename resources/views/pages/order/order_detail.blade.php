@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user"></i> Detalhes do pedido
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}"> Pedido</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do pedido</li>
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
                    <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false"><i class="fas fa-fw fa-cube"></i> Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false"><i class="fas fa-fw fa-tools"></i> Serviços</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0" scope="row" >Nº do pedido</th>
                            <td class="border-top-0" colspan="1">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Tipo do pedido</th>
                            @if($order->budget  ==  '1')
                                <td class="border-top-0" colspan="1"><span class="badge badge-info">Orçamento</span></td>
                            @else
                                <td class="border-top-0" colspan="1"><span class="badge badge-primary">Venda</span></td>
                            @endif
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cliente</th>
                            <td class="border-top-0" colspan="1">{{ $order->client->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Data</th>
                            <td class="border-top-0" colspan="1">{{ $order->order_date->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Previsão de entrega</th>
                            <td class="border-top-0" colspan="1">{{ $order->delivery_forecast ? $order->delivery_forecast->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Vendedor</th>
                            <td class="border-top-0" colspan="1">{{ $salesman->name }}</td>
                        </tr>
                        @if($order->budget  ==  '1')
                            <tr>
                                <th class="border-top-0" scope="row" >Validade do orçamento</th>
                                <td class="border-top-0" colspan="1">{{ $order->validity }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th class="border-top-0" scope="row" >Observação</th>
                            <td class="border-top-0" colspan="1">{{ $order->note }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado por</th>
                            <td class="border-top-0" colspan="1">{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Criado em</th>
                            <td colspan="1">{{ $order->created_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Modificado em</th>
                            <td colspan="1">{{ $order->updated_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('order.edit', ['order' => $order->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                    <div class="border-top-0 table-responsive">
                        <table class="border-top-0 mt-0 table table-bordered">
                            <thead>
                            <tr>
                                <th class="border-top-0" scope="col">Produto</th>
                                <th class="border-top-0" scope="col">Detalhes</th>
                                <th class="border-top-0" scope="col">Quantidade</th>
                                <th class="border-top-0" scope="col">(m)</th>
                                <th class="border-top-0" scope="col">Valor</th>
                                <th class="border-top-0" scope="col">Desconto</th>
                                <th class="border-top-0" scope="col">Valor total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders_products as $order_product)
                                <tr>
                                    <td class="border-top-0" >{{ $order_product->product_id }}</td>
                                    <td class="border-top-0" >{{ $order_product->product_description_order }}</td>
                                    <td class="border-top-0" >{{ $order_product->quantity }}</td>
                                    <td class="border-top-0" >{{ $order_product->meter }}</td>
                                    <td class="border-top-0" >{{ $order_product->sales_value_product_used_order }}</td>
                                    <td class="border-top-0" >{{ $order_product->discount_product }}</td>
                                    <td class="border-top-0" >{{ $order_product->order_product_subtotal }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-warning btn-md" href="{{ route('order.edit', ['order' => $order->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                    <div class="border-top-0 table-responsive">
                        <table class="border-top-0 mt-0 table table-bordered">
                            <thead>
                            <tr>
                                <th class="border-top-0" scope="col">Serviço</th>
                                <th class="border-top-0" scope="col">Detalhes</th>
                                <th class="border-top-0" scope="col">Valor</th>
                                <th class="border-top-0" scope="col">Desconto</th>
                                <th class="border-top-0" scope="col">Valor total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders_services as $order_service)
                                <tr>
                                    <td class="border-top-0" >{{ $order_service->id }}</td>
                                    <td class="border-top-0" >{{ $order_service->service_description_order }}</td>
                                    <td class="border-top-0" >{{ $order_service->sales_value_service_used_order }}</td>
                                    <td class="border-top-0" >{{ $order_service->discount_service }}</td>
                                    <td class="border-top-0" >{{ $order_service->order_service_subtotal }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-warning btn-md" href="{{ route('order.edit', ['order' => $order->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

            </div>
        </div>
    </div>

@endsection
