@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-paste"></i> Cadastro de pedido
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('order.index') }}"> Pedido</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de pedido</li>
            </ol>
        </nav>
    </div>

    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('order.store') }}" onsubmit="checkClient()" novalidate>
        @csrf

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

                    <div class="col-md-5 mb-3 ">
                        <label for="validationCustomClient">Cliente *</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button id="btnAddClient" class="btn btn-primary input-group-sm" type="button"><i class="fas fa-plus-circle"></i></button>
                            </div>
                            <select required name="client_id" id="validationCustomClient" onchange="idClientForAddress(this.value)" data-placeholder="Digite para pesquisar..." class="form-control select_selectize_client" data-allow-clear="1" required>
                                <option  value="">Digite para pesquisar...</option>
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}} - {{$client->person_type === 'PF' ? '(PF)' : '(PJ)'}}</option>
                                @endforeach
                            </select>
                            <div id="validatyClient" class="valid-feedback">
                                Parece bom!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, selecione um cliente.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="salesman">Vendedor</label>
                        <select  name="salesman" id="salesman" data-placeholder="Digite para pesquisar..." class="form-control select_selectize w-100" data-allow-clear="1" required>
                            <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customOrderDate">Data</label>
                        <input type="date" class="form-control" name="order_date" value="{{date('Y-m-d', time()) }}" id="customOrderDate" aria-describedby="orderDateHelp" placeholder="" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customDeliveryForecast">Prev. entrega</label>
                        <input type="date" class="form-control" name="delivery_forecast" id="customDeliveryForecast" aria-describedby="deliveryForecastHelp" placeholder="">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectSituation">Situação</label>
                        <select class="form-control" name="situation_id" id="selectSituation">
                            @foreach($situations as $situation)
                                <option value="{{$situation->id}}">{{$situation->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3" id="divValidity">
                        <label for="customValidity">Validade</label>
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
                    <div class="col-md-8">
                        <select id="searchProduct" data-placeholder="Digite para pesquisar..." class="form-control select_selectize w-100 classSearchProduct" data-allow-clear="1">
                            <option></option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}:{{$product->name}}:{{$product->product_cost_value}}:{{$product->sales_value_product_used}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <button id="btnAddProduct" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Novo produto</button>
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
                    <div class="col-md-4 col-lg-4 ">
                        <button id="btnAddService" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Novo serviço</button>
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
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-4 ">
                        <button id="btnAddAddress" class="form-control btn btn-primary" type="button" data-toggle="modal" data-target="#addressModal" data-whatever="@fat"><i class="fas fa-plus-circle"></i> Novo endereço</button>
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
                            value="0.00"
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
                                        <input type="text" id="total_products" name='total_products' placeholder='0.00' value="0.00" class="form-control" readonly/>
                                    </td>
                                    <td data-name="total_services">
                                        <input type="text" id="total_services" name='total_services' placeholder='0.00' value="0.00" class="form-control" readonly/>
                                    </td>
                                    <td data-name="total_cash_discount">
                                        <input type="text" id="total_cash_discount" name='total_cash_discount' value="0.00" onblur="calcTotal()" onkeyup="calcTotal()" placeholder='' class="form-control"/>
                                    </td>
                                    <td data-name="total_percentage_discount">
                                        <input type="text" id="total_percentage_discount" name="total_percentage_discount" value="0.00" onblur="calcTotal()" onkeyup="calcTotal()" placeholder="" class="form-control" />
                                    </td>
                                    <td class="" data-name="total">
                                        <input type="text" id="total" name='total' placeholder='0.00' class="form-control font-weight-bold text-white bg-primary" readonly required/>
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
                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>
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

    @include('pages.order.modal_address')

@endsection


@section('scriptPages')

    @include('pages.order.handlebars')

    <script src="{{ asset('admin/js/order.js')}}"></script>

    <script type="text/javascript">
        {{-- PRODUCTS --}}
        let products = {
            'products': []
        };
        function updateValueProduct(index, property, newValue, idLine){
            let subtotalProduct = calcSubtotalProduct(idLine)
            products.products[index][property] = newValue;
            products.products[index]['order_product_subtotal'] = subtotalProduct;
            calcTotalProduct();
        }

        function addProduct(value) {
            let countProduct = 0;
            let myStr = value.split(":");
            let idProduct = myStr[0];
            let nameProduct = myStr[1];
            let productCostValue = myStr[2];
            let salesValueProductUsedOrder = myStr[3];
            //verificando se um valor foi adicionado para mandar pro handlesbars
            if(value){
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
                let removeSelectizeItem = value;
                document.getElementById("searchProduct").selectize.removeItem(removeSelectizeItem);
                calcTotalProduct();
            }
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

        {{-- SERVICES --}}
        let services = {
            'services': []
        };
        function updateValueService(index, property, newValue, idLine){
            let subtotalService = calcSubtotalService(idLine)
            services.services[index][property] = newValue;
            services.services[index]['order_service_subtotal'] = subtotalService;
            calcTotalService();
        }

        function addService(value) {
            let countService = 0;
            let myStr = value.split(":");
            let idService = myStr[0];
            let nameService = myStr[1];
            let valueService = myStr[2];
            //verificando se um valor foi adicionado para mandar pro handlesbars
            if(value){
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
                    discount_service: '',
                    order_service_subtotal: valueService,
                }
                services.services.push(infoService);
                service.innerHTML = compiled(services);
                countService+=1;
                // Removendo item selecionado
                let removeSelectizeItem = value;
                document.getElementById("searchService").selectize.removeItem(removeSelectizeItem);
                calcTotalService();
            }
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

        $(document).ready(function() {
            function cleanCep() {
                // Limpa valores do formulário de cep.
                $("#publicPlace").val("");
                $("#disctrict").val("");
            }

            $("#cep").blur(function() {
                let cep = $(this).val().replace(/\D/g, '');
                if(cep != ""){
                    let validateCep = /^[0-9]{8}$/;
                    if(validateCep.test(cep)) {
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {
                            if (!("erro" in data)) {

                                console.log(data)
                                $("#publicPlace").val(data.logradouro);
                                $("#disctrict").val(data.bairro);

                            }else{
                                cleanCep();
                            }
                        });
                    } else {
                        cleanCep();
                    }
                }else{
                    cleanCep();
                }
            });
        });

    </script>
@endsection

