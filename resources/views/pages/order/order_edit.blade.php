@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Edição de pedido
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}"> Pedidos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edição de pedido</li>
            </ol>
        </nav>
    </div>

    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('order.update', ['order' => $order->id]) }}" novalidate>

        @csrf
        @method('put')

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label for="selectOrderType">Tipo Pedido</label>
                        <select class="form-control" name="budget" id="selectOrderType" required>
                            <option></option>
                            <option value="1" {{ $order->budget == '1' ? 'selected': '' }}>Orçamento</option>
                            <option value="0" {{ $order->budget == '0' ? 'selected': '' }}>Venda</option>
                        </select>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecione um tipo.
                        </div>
                    </div>

                    <div class="col-md-5 mb-3 ">
                        <label for="validationCustomClient">Cliente *</label>
                        <select required name="client_id" id="validationCustomClient" onchange="idClientForAddress(this.value)" data-placeholder="Digite para pesquisar..." class="form-control is-valid select_selectize_client w-100" data-allow-clear="1" >
{{--                            <option  value="">Digite para pesquisar...</option>--}}
                            <option  value="{{$order->client->id}}">{{$order->client->name}} - {{$order->client->person_type === 'PF' ? '(PF)' : '(PJ)'}}</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}} - {{$client->person_type === 'PF' ? '(PF)' : '(PJ)'}}</option>
                            @endforeach
                        </select>
                        {{--                        <div class="valid-feedback">--}}
                        {{--                            Parece bom!--}}
                        {{--                        </div>--}}
                        <div class="invalid-feedback">
                            Por favor, selecione um cliente.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="salesman">Vendedor</label>
                        <select  name="salesman" id="salesman" data-placeholder="Digite para pesquisar..." class="form-control select_selectize w-100" data-allow-clear="1" required>
                            <option value="{{$order->user->id}}">{{$order->user->name}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" >{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customOrderDate">Data</label>
                        <input type="date" class="form-control" name="order_date" value="{{ $order->order_date->format('Y-m-d') }}" id="customOrderDate" aria-describedby="orderDateHelp" placeholder="" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customDeliveryForecast">Prev. entrega</label>
                        <input type="date" class="form-control" name="delivery_forecast" value="{{ $order->delivery_forecast ? $order->delivery_forecast->format('Y-m-d') : ''}}" id="customDeliveryForecast" aria-describedby="deliveryForecastHelp" placeholder="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectSituation">Situação</label>
                        <select class="form-control" name="situation_id" id="selectSituation">
                            @foreach($situations as $situation)
                                <option value="{{$situation->id}}" {{ $order->situation->id == $situation->id ? 'selected' : '' }}>{{$situation->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3" id="divValidity">
                        <label for="customValidity">Validade</label>
                        <input type="date" class="form-control" name="validity" id="customValidity" value="{{ $order->validity ? $order->validity->format('Y-m-d') : ''}}" aria-describedby="validitytHelp" placeholder="">
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
                    <div class="col-md-8">
                        <select id="searchProduct" data-placeholder="Digite para pesquisar..." class="form-control select_selectize w-100" data-allow-clear="1">
                            <option></option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}:{{$product->name}}:{{$product->product_cost_value}}:{{$product->sales_value_product_used}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-2 ">
                        <button id="btnAddProduct" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Produto</button>
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
                                    <th style="width: 8%" data-toggle="tooltip" data-placement="right" title="Arredondando para o '0,5' acima. Ex.: 1,2 => 1,5">
                                        (m) <i class="fas fa-info-circle text-info float-right"></i>
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
                                    <td class="text-center" colspan="8">Nenhum produto adicionado</td>
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
                    <div class="col-md-8">
                        <select id="searchService" data-placeholder="Digite para pesquisar..." class="form-control select_selectize w-100" data-allow-clear="1">
                            <option></option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}:{{$service->name}}:{{$service->service_cost_value}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-2 ">
                        <button id="btnAddService" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Serviço</button>
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

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i> Endereço de entrega
            </div>
            <div class="card-body">
                <label class="mb-0">Buscar endereço</label>
                <div class="form-row mb-3">
                    <div class="col-md-8" id="tooltipSearchAddress" >
                        <select id="searchAddress" data-placeholder="Digite para pesquisar..." class="form-control select_selectize_address w-100" data-allow-clear="1" >
                            <option></option>
                            @foreach($addresses->first()->address as $address)
                                <option value="{{$address->id}}:{{$address->cep}}:{{$address->public_place}}:{{$address->number}}:{{$address->district}}:{{$address->complement}}">CEP: {{$address->cep ?  : '-'}} | {{$address->public_place}} | {{$address->number ? : '-'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-2 ">
                        <button id="btnAddAddress" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Endereço</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover" style="width: 100%; min-width: 950px;" id="tab_logic_address">
                            <thead>
                            <tr >
                                <th style="width: 11%; min-width: 130px;">
                                    Cep *
                                </th>
                                <th >
                                    Logradouro
                                </th>
                                <th style="width: 7%; min-width: 85px;">
                                    Nº
                                </th>
                                <th style="" >
                                    Bairro
                                </th>
                                <th style="">
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
                        <input
                            type="text"
                            class="form-control"
                            name="cost_freight"
                            id="customCostFreight"
                            value="{{ $order->cost_freight }}"
                            placeholder="0.00"
                            onblur="calcTotal()"
                            onkeyup="calcTotal()"
                        >
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
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover" style="width: 100%; min-width: 950px;" id="tab_logic_total">
                            <thead>
                            <tr >
                                <th>
                                    Produtos
                                </th>
                                <th >
                                    Serviços
                                </th>
                                <th >
                                    Desconto (R$)
                                </th>
                                <th>
                                    Desconto (%)
                                </th>
                                <th>
                                    Valor total
                                </th>
                            </tr>
                            </thead>
                            <tbody id="containerServices">
                            <tr id="@{{id_handlebars_service}}" class="existsService">
                                <td data-name="total_products">
                                    <input type="text" id="total_products" name='total_products' value="{{ $order->total_products }}" placeholder='0.00' class="form-control" readonly/>
                                </td>
                                <td data-name="total_services">
                                    <input type="text" id="total_services" name='total_services' value="{{ $order->total_services }}" placeholder='0.00' class="form-control" readonly/>
                                </td>
                                <td data-name="total_cash_discount">
                                    <input type="text" id="total_cash_discount" name='total_cash_discount' value="{{ $order->cash_discount }}" onblur="calcTotal()" onkeyup="calcTotal()" placeholder='' class="form-control"/>
                                </td>
                                <td data-name="total_percentage_discount">
                                    <input type="text" id="total_percentage_discount" name="total_percentage_discount" value="{{ $order->percentage_discount }}" onblur="calcTotal()" onkeyup="calcTotal()" placeholder="" class="form-control" />
                                </td>
                                <td class="bg-warning " data-name="total">
                                    <input type="text" id="total" name='total' placeholder='0.00' value="{{ $order->total }}" class="form-control font-weight-bold " readonly required/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i> Observações
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 mb-3">
                        {{--                        <label class=" font-italic font-weight-bold" for="exampleFormControlNoteClient"><i class="fas fa-exclamation-circle"></i>  Está observação será impressa no pedido.</label>--}}
                        {{--                        <br>--}}
                        {{--                        <br>--}}
                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5">{{ $order->note }}</textarea>
                    </div>
                    {{--                    <div class="col-lg-6 col-md-12 mb-3">--}}
                    {{--                         <label class="font-italic font-weight-bold" for="exampleFormControlNoteClient"><i class="fas fa-exclamation-circle"></i>  Está observação é de uso interno, <br>portanto não será impressa no pedido.</label>--}}
                    {{--                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>--}}
                    {{--                    </div>--}}
                </div>

                <div class="form-row mt-2">
                    <button class="btn btn-primary" type="submit" aria-hidden="true"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('order.index') }}"><button class="btn btn-danger ml-2" type="button" aria-hidden="true"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>



    </form>

@endsection

@section('scriptPages')

    <script type="x-handlebars-template" id="tamplateNoProductAdded">
        <tr id="noProductAdded">
            <td class="text-center" colspan="8">Nenhum produto adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateNoServiceAdded">
        <tr id="noServiceAdded">
            <td class="text-center" colspan="6">Nenhum serviço adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateNoAddressAdded">
        <tr id="noAddressAdded">
            <td class="text-center" colspan="7">Nenhum endereço adicionado</td>
        </tr>
    </script>

    <script type="x-handlebars-template" id="tamplateAddProduct">

        @{{#each products}}
        <tr id="@{{id_handlebars_product}}" class="existsProduct">
            <td data-name="product">
                <input type="hidden" name="id_product[]" value="@{{id_product}}">
                <input type="hidden" name="product_cost_value[]" value="@{{product_cost_value}}">
                <input type="text" name='name_product[]' placeholder='' value="@{{name_product}}" class="form-control" readonly/>
            </td>
            <td data-name="product_description_order">
                <input
                    type="text"
                    name='product_description_order[]'
                    value="@{{product_description_order}}"
                    onblur="updateValueProduct(@{{ @index }}, 'product_description_order', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'product_description_order', this.value, '@{{id_handlebars_product}}')"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="quantity_product">
                <input
                    type="text"
                    id="quantityProduct_@{{id_handlebars_product}}"
                    name='quantity_product[]'
                    value="@{{quantity_product}}"
                    onblur="updateValueProduct(@{{ @index }}, 'quantity_product', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'quantity_product', this.value, '@{{id_handlebars_product}}')"
                    placeholder=''
                    class="form-control"
                    required
                />
            </td>
            <td data-name="meter" title="Arredondando para o '0,5' acima. Ex.: 1,2 => 1,5">
                <input
                    type="text"
                    id="meter_@{{id_handlebars_product}}"
                    name='meter[]'
                    onblur="updateValueProduct(@{{ @index }}, 'meter', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'meter', this.value, '@{{id_handlebars_product}}')"
                    value="@{{ meter }}"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="sales_value_product_used_order">
                <input
                    type="text"
                    id="salesValueProductUsedOrder_@{{id_handlebars_product}}"
                    name="sales_value_product_used_order[]"
                    value="@{{sales_value_product_used_order}}"
                    onblur="updateValueProduct(@{{ @index }}, 'sales_value_product_used_order', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'sales_value_product_used_order', this.value, '@{{id_handlebars_product}}')"
                    placeholder=""
                    class="form-control"
                />
            </td>
            <td data-name="discount_product">
                <input
                    type="text"
                    id="discountProduct_@{{id_handlebars_product}}"
                    name='discount_product[]'
                    onblur="updateValueProduct(@{{ @index }}, 'discount_product', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'discount_product', this.value, '@{{id_handlebars_product}}')"
                    value="@{{ discount_product }}"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="order_product_subtotal">
                <input
                    type="text"
                    id="orderProductSubtotal_@{{id_handlebars_product}}"
                    name='order_product_subtotal[]'
                    value="@{{order_product_subtotal}}"
                    onblur="updateValueProduct(@{{ @index }}, 'order_product_subtotal', this.value, '@{{id_handlebars_product}}')"
                    onkeyup="updateValueProduct(@{{ @index }}, 'order_product_subtotal', this.value, '@{{id_handlebars_product}}')"
                    placeholder='0,00'
                    class="form-control order_product_subtotal"
                    required
                    readonly
                />
            </td>
            <td data-name="del_product">
                <button
                    class='btn btn-danger row-remove'
                    onclick="removeProduct(@{{ @index }})">
                    <i class="fas fa-times-circle"></i>
                </button>
            </td>
        </tr>
        @{{/each}}
    </script>

    <script type="x-handlebars-template" id="tamplateAddService">

        @{{#each services}}
        <tr id="@{{id_handlebars_service}}" class="existsService">
            <td data-name="service">
                <input type="hidden" name="id_service[]" value="@{{id_service}}">
                <input type="hidden" name="service_cost_value[]" value="@{{service_cost_value}}">
                <input type="text" name='name_service[]' value="@{{name_service}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="description_service">
                <input
                    type="text"
                    name='service_description_order[]'
                    value="@{{service_description_order}}"
                    onblur="updateValueService(@{{ @index }}, 'service_description_order', this.value, '@{{id_handlebars_service}}')"
                    onkeyup="updateValueService(@{{ @index }}, 'service_description_order', this.value, '@{{id_handlebars_service}}')"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="sales_value_service_used_order">
                <input
                    type="text"
                    id="serviceCostValue_@{{id_handlebars_service}}"
                    name="sales_value_service_used_order[]"
                    value="@{{sales_value_service_used_order}}"
                    onblur="updateValueService(@{{ @index }}, 'sales_value_service_used_order', this.value, '@{{id_handlebars_service}}')"
                    onkeyup="updateValueService(@{{ @index }}, 'sales_value_service_used_order', this.value, '@{{id_handlebars_service}}')"
                    placeholder=""
                    class="form-control"
                />
            </td>
            <td data-name="discount_service">
                <input
                    type="text"
                    id="discountService_@{{id_handlebars_service}}"
                    name='discount_service[]'
                    onblur="updateValueService(@{{ @index }}, 'discount_service', this.value, '@{{id_handlebars_service}}')"
                    onkeyup="updateValueService(@{{ @index }}, 'discount_service', this.value, '@{{id_handlebars_service}}')"
                    value="@{{ discount_service }}"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="subtotal_service">
                <input
                    type="text"
                    id="orderServiceSubtotal_@{{id_handlebars_service}}"
                    name='order_service_subtotal[]'
                    value="@{{ order_service_subtotal }}"
                    onblur="updateValueService(@{{ @index }}, 'order_service_subtotal', this.value, '@{{id_handlebars_service}}')"
                    onkeyup="updateValueService(@{{ @index }}, 'order_service_subtotal', this.value, '@{{id_handlebars_service}}')"
                    placeholder=''
                    class="form-control order_service_subtotal"
                    required
                    readonly
                />
            </td>
            <td data-name="del_service">
                <button
                    class='btn btn-danger row-remove'
                    onclick="removeService(@{{ @index }})">
                    <i class="fas fa-times-circle"></i>
                </button>
            </td>
        </tr>
        @{{/each}}

    </script>

    <script type="x-handlebars-template" id="tamplateAddAddress">

        <tr id="@{{id_handlebars_address}}" class="existsAddress">
            <td data-name="address">
                <input type="hidden" id="remove_address" value="@{{id_handlebars_address}}">
                <input type="hidden" name="delivery_address_id" value="@{{id_address}}">
                <input type="text" name='cep' value="@{{cep}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="public_place">
                <input type="text" name='public_place' value="@{{public_place}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="number">
                <input type="text" name='number' value="@{{number}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="district">
                <input type="text" name="district" value="@{{district}}" placeholder="" class="form-control" readonly/>
            </td>
            <td data-name="complement">
                <input type="text" name='complement' value="@{{complement}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="del_address">
                <button
                    class='btn btn-danger row-remove'
                    onclick="removeAddress('@{{id_handlebars_address}}')">
                    <i class="fas fa-times-circle"></i>
                </button>
            </td>
        </tr>

    </script>


    {{--<script src="{{ asset('admin/js/order.js')}}"></script>--}}
    <script type="text/javascript">


        // ------------------------------------    FORM PEDIDO HIDE CAMPOS
        $(document).ready(function(){
            //executar quando a página é carregada
            esconde();

            //executar todas as vezes que houver alterações do select;
            $('#selectOrderType').change(function(){
                esconde();
            });


        });

        function esconde(){
            //quando tiver editando o formuláro o valor fica no Select
            selectedValue = $('#selectOrderType').val();

            //quando tiver visualizando o formulário o valor fica no campo text;
            if(!selectedValue){
                selectedValue = $('#selectOrderType').text();
            }
            switch(selectedValue) {
                case "0":
                    $('#divValidity').hide();
                    $("#divValidity").val("");

                    break;
                case "1":
                    $('#divValidity').show();
                    break;
                default:
                    $('#divValidity').hide();
                    $("#divValidity").val("");

            }
        }

        //DESABILITA ENVIO POR ENTER
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        // SELECTIZE
        $(document).ready(function () {

            $(".select_selectize").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),

            });

            $(".select_selectize_client").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),

                onChange:function (value){
                    if(value !== ''){
                        $(".select_selectize_client").removeClass("is-invalid").addClass("is-valid")
                    }else{
                        $(".select_selectize_client").removeClass("is-valid").addClass("is-invalid")
                    }
                },
            });

            $(".select_selectize_address").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),
                onFocus: function () {
                    // control has gained focus
                    let selectClient = $(document.getElementById('validationCustomClient').value);

                    if(selectClient.prevObject === undefined){
                        $('#tooltipSearchAddress').tooltip({
                            'trigger': 'manual',
                            'title': 'Selecione um cliente por favor.',
                            'placement': 'top'
                        }).tooltip('show');
                    }

                },
                onBlur: function () {
                    $('#tooltipSearchAddress').tooltip().tooltip('dispose');
                },

            });
        });


        let countProduct = 0;

        let products = {
            'products': []
        };

        function loadProducts(idProduct, nameProduct, productDescriptionOrder, quantity, meter, productCostValue, salesValueProductUsedOrder, discountProduct, orderProductSubtotal){

            //verificando se um valor foi adicionado para mandar pro handlesbars
            if(idProduct){
                if (document.getElementById("noProductAdded")) {
                    document.getElementById("noProductAdded").remove()
                }

                let templateProduct = document.getElementById('tamplateAddProduct').innerHTML;
                let compiled = Handlebars.compile(templateProduct);

                let product = document.getElementById('containerProducts');

                // let randomProduct = Math.floor((Math.random() * 100000000) + 1);
                let randomProduct = 'product_'+countProduct;

                let infoProduct = {
                    id_handlebars_product: randomProduct,
                    id_product: idProduct,
                    name_product: nameProduct,
                    product_description_order: productDescriptionOrder,
                    quantity_product: quantity,
                    meter: meter,
                    product_cost_value: productCostValue,
                    sales_value_product_used_order: salesValueProductUsedOrder,
                    discount_product: discountProduct,
                    order_product_subtotal: orderProductSubtotal,
                }

                products.products.push(infoProduct);
                product.innerHTML = compiled(products);

                countProduct+=1;

                // Removendo item selecionado
                // let removeSelectizeItem = document.getElementById("searchProduct").value;
                // document.getElementById("searchProduct").selectize.removeItem(removeSelectizeItem);

                // calcTotalProduct();
            }
        }

        function updateValueProduct(index, property, newValue, idLine){

            let subtotalProduct = calcSubtotalProduct(idLine)

            products.products[index][property] = newValue;
            products.products[index]['order_product_subtotal'] = subtotalProduct;

            calcTotalProduct();
        }
        function addProduct() {

            let botaoAdd = document.getElementById('btnAddProduct');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchProduct").value).split(":");
                let idProduct = myStr[0];
                let nameProduct = myStr[1];
                let productCostValue = myStr[2];
                let salesValueProductUsedOrder = myStr[3];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchProduct").value){
                    if (document.getElementById("noProductAdded")) {
                        document.getElementById("noProductAdded").remove()
                    }

                    let templateProduct = document.getElementById('tamplateAddProduct').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let product = document.getElementById('containerProducts');

                    // let randomProduct = Math.floor((Math.random() * 100000000) + 1);
                    let randomProduct = 'product_'+countProduct;

                    let infoProduct = {
                        id_handlebars_product: randomProduct,
                        id_product: idProduct,
                        name_product: nameProduct,
                        product_description_order: '',
                        quantity_product: 1,
                        meter: '',
                        product_cost_value: productCostValue,
                        sales_value_product_used_order: salesValueProductUsedOrder,
                        discount_product: '',
                        order_product_subtotal: salesValueProductUsedOrder,
                    }

                    products.products.push(infoProduct);
                    product.innerHTML = compiled(products);

                    countProduct+=1;

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchProduct").value;
                    document.getElementById("searchProduct").selectize.removeItem(removeSelectizeItem);

                    calcTotalProduct();
                }

            })

        }


        let countService = 0;

        let services = {
            'services': []
        };

        function loadServices(idService, nameService, serviceDescriptionOrder, serviceCostValue, salesValueServiceUsedOrder, discountService, orderServiceSubtotal){

            //verificando se um valor foi adicionado para mandar pro handlesbars
            if(idService){
                if (document.getElementById("noServiceAdded")) {
                    document.getElementById("noServiceAdded").remove()
                }

                let templateProduct = document.getElementById('tamplateAddService').innerHTML;
                let compiled = Handlebars.compile(templateProduct);

                let service = document.getElementById('containerServices');

                // let randomService = Math.floor((Math.random() * 100000000) + 1);
                let randomService = 'product_'+countService;

                let infoService = {
                    id_handlebars_service: randomService,
                    id_service: idService,
                    name_service: nameService,
                    service_description_order: serviceDescriptionOrder,
                    service_cost_value: serviceCostValue,
                    sales_value_service_used_order: salesValueServiceUsedOrder,
                    discount_service: discountService,
                    order_service_subtotal: orderServiceSubtotal,
                }

                services.services.push(infoService);
                service.innerHTML = compiled(services);

                countService+=1;

                // // Removendo item selecionado
                // let removeSelectizeItem = document.getElementById("searchService").value;
                // document.getElementById("searchService").selectize.removeItem(removeSelectizeItem);
                //
                // calcTotalService();
            }
        }

        function updateValueService(index, property, newValue, idLine){

            let subtotalService = calcSubtotalService(idLine)

            services.services[index][property] = newValue;
            services.services[index]['order_service_subtotal'] = subtotalService;

            calcTotalService();
        }

        function addService() {


            let botaoAdd = document.getElementById('btnAddService');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchService").value).split(":");
                let idService = myStr[0];
                let nameService = myStr[1];
                let valueService = myStr[2];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchService").value){
                    if (document.getElementById("noServiceAdded")) {
                        document.getElementById("noServiceAdded").remove()
                    }

                    let templateProduct = document.getElementById('tamplateAddService').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let service = document.getElementById('containerServices');

                    // let randomService = Math.floor((Math.random() * 100000000) + 1);
                    let randomService = 'product_'+countService;

                    let infoService = {
                        id_handlebars_service: randomService,
                        id_service: idService,
                        name_service: nameService,
                        service_description_order: '',
                        service_cost_value: valueService,
                        sales_value_service_used_order: valueService,
                        discount_service: '',
                        order_service_subtotal: valueService,
                    }

                    services.services.push(infoService);
                    service.innerHTML = compiled(services);

                    countService+=1;

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchService").value;
                    document.getElementById("searchService").selectize.removeItem(removeSelectizeItem);

                    calcTotalService();
                }

            })

        }

        function loadAddress(idAddress, cepAddress, publicPlaceAddress, numberAddress, districtAddress, complementAddress){
            if(idAddress){
                if (document.getElementById("noAddressAdded")) {
                    document.getElementById("noAddressAdded").remove()
                }else{
                    document.getElementById("addressHandlebars").remove();
                }


                let templateProduct = document.getElementById('tamplateAddAddress').innerHTML;
                let compiled = Handlebars.compile(templateProduct);

                let service = document.getElementById('containerAddresses');

                let infoAddress = {
                    id_handlebars_address: "addressHandlebars",
                    id_address: idAddress,
                    cep: cepAddress,
                    public_place: publicPlaceAddress,
                    number: numberAddress,
                    district: districtAddress,
                    complement: complementAddress,
                }

                service.innerHTML += compiled(infoAddress);

            }
        }

        function addDeliveryAddress() {

            let botaoAdd = document.getElementById('btnAddAddress');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchAddress").value).split(":");
                let idAddress = myStr[0];
                let cepAddress = myStr[1];
                let publicPlaceAddress = myStr[2];
                let numberAddress = myStr[3];
                let districtAddress = myStr[4];
                let complementAddress = myStr[5];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchAddress").value){
                    if (document.getElementById("noAddressAdded")) {
                        document.getElementById("noAddressAdded").remove()
                    }else{
                        document.getElementById("addressHandlebars").remove();
                    }


                    let templateProduct = document.getElementById('tamplateAddAddress').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let service = document.getElementById('containerAddresses');

                    let infoAddress = {
                        id_handlebars_address: "addressHandlebars",
                        id_address: idAddress,
                        cep: cepAddress,
                        public_place: publicPlaceAddress,
                        number: numberAddress,
                        district: districtAddress,
                        complement: complementAddress,
                    }

                    service.innerHTML += compiled(infoAddress);

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchAddress").value;
                    document.getElementById("searchAddress").selectize.removeItem(removeSelectizeItem);

                }

            })

        }

        function removeProduct(indexToRemove) {

            products.products.splice(indexToRemove, 1);

            let templateProduct = document.getElementById('tamplateAddProduct').innerHTML;
            let compiled = Handlebars.compile(templateProduct);
            let product = document.getElementById('containerProducts');
            product.innerHTML = compiled(products);


            if(document.getElementsByClassName("existsProduct").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoProductAdded").innerHTML);
                document.getElementById('containerProducts').innerHTML = compiled();
            }

            calcTotalProduct();
        }

        function removeService(indexToRemove) {

            services.services.splice(indexToRemove, 1);

            let templateService = document.getElementById('tamplateAddService').innerHTML;
            let compiled = Handlebars.compile(templateService);
            let service = document.getElementById('containerServices');
            service.innerHTML = compiled(services);

            if(document.getElementsByClassName("existsService").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoServiceAdded").innerHTML);
                document.getElementById('containerServices').innerHTML = compiled();
            }

            calcTotalService();
        }

        function removeAddress(id) {

            document.getElementById(id).remove();

            if(document.getElementsByClassName("existsAddress").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoAddressAdded").innerHTML);
                document.getElementById('containerAddresses').innerHTML = compiled();
            }
        }

        addProduct();
        addService();
        addDeliveryAddress();

        @foreach($orders_products as $order_product)
            loadProducts(
                "{{$order_product->product->id}}",
                "{{$order_product->product->name}}",
                "{{$order_product->product_description_order}}",
                "{{$order_product->quantity}}",
                "{{$order_product->meter}}",
                "{{$order_product->product_cost_value_when_order_placed}}",
                "{{$order_product->sales_value_product_used_order}}",
                "{{$order_product->discount_product}}",
                "{{$order_product->order_product_subtotal}}"
                );
        @endforeach

        @foreach($orders_services as $order_service)
        loadServices(
            "{{$order_service->service->id}}",
            "{{$order_service->service->name}}",
            "{{$order_service->service_description_order}}",
            "{{$order_service->service_cost_value_when_order_placed}}",
            "{{$order_service->sales_value_service_used_order}}",
            "{{$order_service->discount_service}}",
            "{{$order_service->order_service_subtotal}}"
        );
        @endforeach

        loadAddress(
            "{{$orders_address->id}}",
            "{{$orders_address->cep}}",
            "{{$orders_address->public_place}}",
            "{{$orders_address->number}}",
            "{{$orders_address->district}}",
            "{{$orders_address->complement}}",
        );

        // ------------------------------------------------------------------------------------------------------------------------------------------------------

        function calcSubtotalProduct(id){
            let quantityProduct = $('#quantityProduct_'+id).val()
            let meter = $('#meter_'+id).val()
            let productOrderValue = $('#salesValueProductUsedOrder_'+id).val()
            let discountProduct = $('#discountProduct_'+id).val()
            let subtotalProduct;

            if(meter){
                subtotalProduct = (quantityProduct *  (Math.ceil(meter * 2) / 2) * productOrderValue) - discountProduct;
            }else{
                subtotalProduct = (quantityProduct * productOrderValue) - discountProduct;
            }

            $('#orderProductSubtotal_'+id).val(subtotalProduct)
            return subtotalProduct;
        }

        function calcTotalProduct(){

            //AQUI FAZER LOOP PARA CONTAR QUANTOS PRODUTOS TEM E SOMAR TODOS OS SUBTOTAIS
            let countProduct = $("input.order_product_subtotal").length;
            let valuesProducts = $("input.order_product_subtotal").map(function(){return $(this).val();}).get();

            let totalProduct = 0;

            if(countProduct > 0){
                for (let i = 0; i < countProduct; i++){
                    totalProduct += parseFloat(valuesProducts[i]);
                }
            }
            $('#total_products').val(totalProduct);
            calcTotal();
        }

        function calcSubtotalService(id){
            let serviceCostValue = $('#serviceCostValue_'+id).val();
            let discountService = $('#discountService_'+id).val();
            let serviceSubtotal;

            serviceSubtotal = serviceCostValue - discountService;

            $('#orderServiceSubtotal_'+id).val(serviceSubtotal)
            return serviceSubtotal;
        }

        function calcTotalService(){

            //AQUI FAZER LOOP PARA CONTAR QUANTOS SERVIÇOS TEM E SOMAR TODOS OS SUBTOTAIS
            let countService = $("input.order_service_subtotal").length;
            let valuesServices = $("input.order_service_subtotal").map(function(){return $(this).val();}).get();

            let totalService = 0;

            if(countService > 0){
                for (let i = 0; i < countService; i++){
                    totalService += parseFloat(valuesServices[i]);
                }
            }
            $('#total_services').val(totalService);
            calcTotal();
        }


        function calcTotal(){

            let totalProducts = parseFloat($('#total_products').val());
            let totalServices = parseFloat($('#total_services').val());
            let costFreight = parseFloat($('#customCostFreight').val());

            let totalCashDiscount = parseFloat($("#total_cash_discount").val());
            let totalPercentageDiscount = parseFloat($("#total_percentage_discount").val());


            if(!costFreight){
                costFreight = 0;
            }
            if(!totalProducts){
                totalProducts = 0;
            }
            if(!totalServices){
                totalServices = 0;
            }

            let sumSubtotal = totalProducts + totalServices + costFreight;

            if(totalCashDiscount && totalPercentageDiscount){
                let percentageDiscount  = (sumSubtotal-totalCashDiscount) * totalPercentageDiscount
                $('#total').val((sumSubtotal-totalCashDiscount) - (percentageDiscount / 100 ));

            }else if(totalCashDiscount){
                $('#total').val(sumSubtotal-totalCashDiscount);

            }else if(totalPercentageDiscount){
                let percentageDiscount  = (sumSubtotal) * totalPercentageDiscount
                $('#total').val((sumSubtotal) - (percentageDiscount / 100 ));
            }else{
                $('#total').val(sumSubtotal);
            }

        }


        //RETORNA ENDEREÇOS DO CLIENTE SELECIONADO
        function idClientForAddress(value) {

            $.ajax({
                url: "{{ route('returnClientAddress') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
                },
                success: function (data){

                    let $selectAddress = $(document.getElementById('searchAddress'));
                    let option = $selectAddress[0].selectize;

                    for(let i=0; i <= $selectAddress.length; i++){
                        option.clearOptions(true)
                    }

                    if(!data[0]){
                        $('#tooltipSearchAddress').tooltip({
                            'trigger': 'manual',
                            'title': 'Cliente sem endereços cadastrados.',
                            'placement': 'top'
                        }).tooltip('show');
                    }

                    $.each(data, function (key, val) {

                        let  count = option.items.length + 1;

                        if(!val.cep){ val.cep = '-' }
                        if(!val.number){ val.number = '-'}

                        option.addOption({value: val.id+':'+val.cep+':'+val.public_place+':'+val.number+':'+val.district+':'+val.complement, text: 'CEP: '+val.cep+' | '+val.public_place+' | '+val.number});

                        option.addItem(count);

                    });
                },
            });

            //removendo handlesbars de endereco do cliente anterior
            if (document.getElementsByClassName("existsAddress").length > 0){
                removeAddress(document.getElementById("remove_address").value);
            }
        }


    </script>
@endsection

