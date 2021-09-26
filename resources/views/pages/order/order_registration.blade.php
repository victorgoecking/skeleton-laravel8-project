@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Cadastro de pedido
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}"> Pedido</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de pedido</li>
            </ol>
        </nav>
    </div>

    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('order.store') }}" novalidate>
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-2 mb-3">
                        <label for="selectOrderType">Tipo Pedido</label>
                        <select class="form-control" name="budget" id="selectOrderType" required>
                            <option></option>
                            <option value="1">Orçamento</option>
                            <option value="0">Venda</option>
                        </select>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecione um tipo.
                        </div>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="validationCustomClient">Cliente *</label>
                        <select  name="client_id" id="validationCustomClient" data-placeholder="Digite para pesquisar" class="form-control select_selectize w-100" data-allow-clear="1" required>
                            <option></option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}} - {{$client->person_type === 'PF' ? '(PF)' : '(PJ)'}}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o cliente.
                        </div>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="customUser">Vendedor / Responsável</label>
                        <input type="text" class="form-control" name="user_id" id="customUser" aria-describedby="cpfHelp" placeholder="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customOrderDate">Data</label>
                        <input type="date" class="form-control" name="order_date" id="customOrderDate" aria-describedby="orderDateHelp" placeholder="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customDeliveryForecast">Previsão de entrega</label>
                        <input type="date" class="form-control" name="delivery_forecast" id="customDeliveryForecast" aria-describedby="deliveryForecastHelp" placeholder="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectSituation">Situação</label>
                        <select class="form-control" name="situation" id="selectSituation">
                            <option value="1" selected>Em aberto</option>
                            <option value="0">Em andamento</option>
                            <option value="0">Concretizada</option>
                            <option value="0">Cancelada</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3" id="divValidity">
                        <label for="customValidity">Validade Orçamento</label>
                        <input type="date" class="form-control" name="validity" id="customValidity" aria-describedby="validitytHelp" placeholder="">
                    </div>
                </div>



            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-cube"></i> Produtos
            </div>
            <div class="card-body">
                <label class="mb-0">Buscar produto</label>
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <select id="searchProduct" name="product_id_search" data-placeholder="Digite para pesquisar" class="form-control select_selectize w-100" data-allow-clear="1">
                            <option></option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}:{{$product->name}}:{{$product->sales_value_product_used}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button id="btnAddProduct" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Adicionar produto</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover"  style="width: 100%; min-width: 950px;" id="tab_logic_product">
                            <thead>
                                <tr >
                                    <th >
                                        Produto *
                                    </th>
                                    <th >
                                        Detalhes
                                    </th>
                                    <th style="width: 8%">
                                        Quant. *
                                    </th>
                                    <th style="width: 12%" >
                                        Valor *
                                    </th>
                                    <th style="width: 12%">
                                        Desconto
                                    </th>
                                    <th style="width: 12%">
                                        Subtotal
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Del
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="containerProducts">
                                <tr id="noProductAdded">
                                    <td class="text-center" colspan="7">Nenhum produto adicionado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-tools"></i> Serviços
            </div>
            <div class="card-body">
                <label class="mb-0">Buscar serviço</label>
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <select id="searchService" name="service_id_search" data-placeholder="Digite para pesquisar" class="form-control select_selectize w-100" data-allow-clear="1">
                            <option></option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}:{{$service->name}}:{{$service->service_cost_value}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button id="btnAddService" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Adicionar serviço</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover" style="width: 100%; min-width: 950px;" id="tab_logic_service">
                            <thead>
                                <tr >
                                    <th>
                                        Serviço *
                                    </th>
                                    <th >
                                        Detalhes
                                    </th>
                                    <th style="width: 8%">
                                        Quant. *
                                    </th>
                                    <th style="width: 12%" >
                                        Valor *
                                    </th>
                                    <th style="width: 12%">
                                        Desconto
                                    </th>
                                    <th style="width: 12%">
                                        Subtotal
                                    </th>
                                    <th style="width: 5%" class="text-center">
                                        Del
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="containerServices">
                                <tr id="noServiceAdded">
                                    <td class="text-center" colspan="7">Nenhum serviço adicionado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
{{--        @php--}}
{{--            echo"<pre>"; var_dump($clients[]->address);exit;--}}
{{--        @endphp--}}

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i> Endereço de entrega
            </div>
            <div class="card-body">
                <label class="mb-0">Buscar endereço</label>
                <div class="form-row mb-3">
                    <div class="col-md-6">
                        <select id="searchAddress" name="address_id_search" data-placeholder="Digite para pesquisar" class="form-control select_selectize w-100" data-allow-clear="1">
                            <option></option>

{{--                            @foreach($clients->address as $address)--}}
{{--                                <option value="{{$address->id}}:{{ $address->cep }}:{{$address->public_place}}:{{$address->number}}:{{$address->district}}:{{$address->complement}}">{{$address->cep}} | {{$address->public_place}} | Nº {{$address->number}}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button id="btnAddAddress" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Adicionar endereço</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover" style="width: 100%; min-width: 950px;" id="tab_logic_address">
                            <thead>
                            <tr >
                                <th>
                                    Cep *
                                </th>
                                <th >
                                    Logradouro
                                </th>
                                <th style="width: 8%">
                                    Nº
                                </th>
                                <th style="width: 12%" >
                                    Bairro
                                </th>
                                <th style="width: 12%">
                                    Complemento
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Del
                                </th>
                            </tr>
                            </thead>
                            <tbody id="containerAddresses">
                            <tr id="noAddressAdded">
                                <td class="text-center" colspan="7">Nenhum endereço adicionado</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-truck-moving"></i> Transporte
            </div>
            <div class="card-body">
                <div class="form-row">


                    <div class="col-md-6 mb-3">
                        <label for="customCostFreight">Valor do frete</label>
                        <input type="text" class="form-control" name="cost_freight" id="customCostFreight" placeholder="0.00">
                    </div>


                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-dollar-sign"></i> Total
            </div>
            <div class="card-body">
                <div class="form-row">


                    TOTAL


                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i> Observações
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-6 col-md-12 mb-3">
                        <label class=" font-italic font-weight-bold" for="exampleFormControlNoteClient"><i class="fas fa-exclamation-circle"></i>  Está observação será impressa no pedido.</label>
                        <br>
                        <br>
                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3">
                         <label class="font-italic font-weight-bold" for="exampleFormControlNoteClient"><i class="fas fa-exclamation-circle"></i>  Está observação é de uso interno, <br>portanto não será impressa no pedido.</label>
                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-row mt-2">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('order.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>



    </form>

@endsection

@section('scriptPages')

    <script type="x-handlebars-template" id="tamplateNoProductAdded">
        <tr id="noProductAdded">
            <td class="text-center" colspan="7">Nenhum produto adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateNoServiceAdded">
        <tr id="noServiceAdded">
            <td class="text-center" colspan="7">Nenhum serviço adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateNoAddressAdded">
        <tr id="noAddressAdded">
            <td class="text-center" colspan="7">Nenhum endereço adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateAddProduct">

        <tr id="@{{id_handlebars_product}}" class="existsProduct">
            <td data-name="product">
                <input type="hidden" name="id_product[]" value="@{{id_product}}">
                <input type="text" name='name_product[]' placeholder='' value="@{{name_product}}" class="form-control" disabled/>
            </td>
            <td data-name="description_product">
                <input type="text" name='description_product[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="quantity">
                <input type="text" name='quantity_product[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="product_order_value">
                <input type="text" name="product_order_value[]" value="@{{value_product}}" placeholder="" class="form-control" />
            </td>
            <td data-name="discount_product">
                <input type="text" name='discount_product[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="subtotal_product">
                <input type="text" name='subtotal_product[]' placeholder='0,00' class="form-control"/>
            </td>
            <td data-name="del_product">
                <button class='btn btn-danger glyphicon glyphicon-remove row-remove' onclick="removeDiv(@{{id_handlebars_product}})"><span aria-hidden="true">×</span></button>
            </td>
        </tr>

    </script>

    <script type="x-handlebars-template" id="tamplateAddService">

        <tr id="@{{id_handlebars_service}}" class="existsService">
            <td data-name="service">
                <input type="hidden" name="id_service[]" value="@{{id_service}}">
                <input type="text" name='name_service[]' value="@{{name_service}}" placeholder='' class="form-control" disabled/>
            </td>
            <td data-name="description_service">
                <input type="text" name='description_service[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="quantidade">
                <input type="text" name='quantity_service[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="service_cost_value">
                <input type="text" name="service_cost_value[]" value="@{{value_service}}" placeholder="" class="form-control" />
            </td>
            <td data-name="discount_service">
                <input type="text" name='discount_service[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="subtotal_service">
                <input type="text" name='subtotal_service[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="del_service">
                <button class='btn btn-danger glyphicon glyphicon-remove row-remove' onclick="removeDiv(@{{id_handlebars_service}})"><span aria-hidden="true">×</span></button>
            </td>
        </tr>

    </script>

    <script type="x-handlebars-template" id="tamplateAddAddress">

        <tr id="@{{id_handlebars_address}}" class="existsAddress">
            <td data-name="address">
                <input type="hidden" name="id_address[]" value="@{{id_address}}">
                <input type="text" name='cep[]' value="@{{cep}}" placeholder='' class="form-control" disabled/>
            </td>
            <td data-name="public_place">
                <input type="text" name='public_place[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="number">
                <input type="text" name='number[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="district">
                <input type="text" name="district[]" value="@{{value_service}}" placeholder="" class="form-control" />
            </td>
            <td data-name="complement">
                <input type="text" name='complement[]' placeholder='' class="form-control"/>
            </td>
            <td data-name="del_address">
                <button class='btn btn-danger glyphicon glyphicon-remove row-remove' onclick="removeDiv(@{{id_handlebars_address}})"><span aria-hidden="true">×</span></button>
            </td>
        </tr>

    </script>
    <script src="{{ asset('admin/js/order.js')}}"></script>
@endsection
