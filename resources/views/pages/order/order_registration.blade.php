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







    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h3>Step 1</h3>
                                <p>This is step 1</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h3>Step 2</h3>
                                <p>This is step 2</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h3>Step 3</h3>
                                <p>This is step 3</p>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <h3>Complete</h3>
                                <p>You have successfully completed all steps.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>












{{--    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('order.store') }}" novalidate>--}}
{{--        @csrf--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}

{{--                    <div class="col-md-2 mb-3">--}}
{{--                        <label for="selectOrderType">Tipo Pedido</label>--}}
{{--                        <select class="form-control" name="budget" id="selectOrderType">--}}
{{--                            <option value="1" selected>Orçamento</option>--}}
{{--                            <option value="0">Venda</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-5 mb-3">--}}
{{--                        <label for="validationCustomClient">Cliente *</label>--}}
{{--                        <input type="text" class="form-control" name="client_id" id="validationCustomClient" placeholder="" required>--}}
{{--                        <div class="valid-feedback">--}}
{{--                            Parece bom!--}}
{{--                        </div>--}}
{{--                        <div class="invalid-feedback">--}}
{{--                            Por favor, informe o cliente.--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-5 mb-3">--}}
{{--                        <label for="customUser">Vendedor / Responsável</label>--}}
{{--                        <input type="text" class="form-control" name="user_id" id="customUser" aria-describedby="cpfHelp" placeholder="">--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <label for="customOrderDate">Data</label>--}}
{{--                        <input type="date" class="form-control" name="order_date" id="customOrderDate" aria-describedby="orderDateHelp" placeholder="">--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <label for="customDeliveryForecast">Previsão de entrega</label>--}}
{{--                        <input type="date" class="form-control" name="delivery_forecast" id="customDeliveryForecast" aria-describedby="deliveryForecastHelp" placeholder="">--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3 mb-3">--}}
{{--                        <label for="selectSituation">Situação</label>--}}
{{--                        <select class="form-control" name="situation" id="selectSituation">--}}
{{--                            <option value="1" selected>Em aberto</option>--}}
{{--                            <option value="0">Em andamento</option>--}}
{{--                            <option value="0">Concretizada</option>--}}
{{--                            <option value="0">Cancelada</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3 mb-3" id="divValidity">--}}
{{--                        <label for="customValidity">Validade Orçamento</label>--}}
{{--                        <input type="date" class="form-control" name="validity" id="customValidity" aria-describedby="validitytHelp" placeholder="">--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-fw fa-cube"></i> Produtos--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}


{{--                    <div class="col-md-12 table-responsive">--}}
{{--                        <table class="table table-bordered table-hover table-sortable" id="tab_logic_product">--}}
{{--                            <thead>--}}
{{--                            <tr >--}}
{{--                                <th >--}}
{{--                                    Produto *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Detalhes--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Quantidade *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Valor *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Desconto--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Subtotal--}}
{{--                                </th>--}}
{{--                                <th class="text-center">--}}
{{--                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">--}}
{{--                                    Del--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr id='addr0' data-id="0" class="hidden">--}}
{{--                                <td data-name="product">--}}
{{--                                    <input type="text" name='product'  placeholder='' class="form-control"/>--}}
{{--                                    <select class="select_product" name='product' placeholder="Digite para buscar" >--}}
{{--                                        <option value="">Digite para buscar</option>--}}
{{--                                        <option value="AL">Alabama</option>--}}
{{--                                        <option value="AK">Alaska</option>--}}
{{--                                        <option value="AZ">Arizona</option>--}}
{{--                                        <option value="AR">Arkansas</option>--}}
{{--                                        <option value="CA">California</option>--}}
{{--                                        <option value="CO">Colorado</option>--}}
{{--                                        <option value="CT">Connecticut</option>--}}
{{--                                        <option value="DE">Delaware</option>--}}
{{--                                        <option value="DC">District of Columbia</option>--}}
{{--                                        <option value="FL">Florida</option>--}}
{{--                                        <option value="GA">Georgia</option>--}}
{{--                                        <option value="HI">Hawaii</option>--}}
{{--                                        <option value="ID">Idaho</option>--}}
{{--                                        <option value="IL">Illinois</option>--}}
{{--                                        <option value="IN">Indiana</option>--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                                <td data-name="description_product">--}}
{{--                                    <input type="text" name='description_product' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="quantity">--}}
{{--                                    <input type="text" name='quantity' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="product_order_value">--}}
{{--                                    <input type="text" name="product_order_value" placeholder="" class="form-control" />--}}
{{--                                </td>--}}
{{--                                <td data-name="discount_product">--}}
{{--                                    <input type="text" name='discount_product' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="subtotal_product">--}}
{{--                                    <input type="text" name='subtotal_product' placeholder='0,00' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="del_product">--}}
{{--                                    <button name="del_product" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <a id="add_new_product" class="btn btn-primary float-right">Adicionar outro produto</a>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-fw fa-tools"></i> Serviços--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}


{{--                    <div class="col-md-12 table-responsive">--}}
{{--                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">--}}
{{--                            <thead>--}}
{{--                            <tr >--}}
{{--                                <th >--}}
{{--                                    Serviço *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Detalhes--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Quantidade *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Valor *--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Desconto--}}
{{--                                </th>--}}
{{--                                <th >--}}
{{--                                    Subtotal--}}
{{--                                </th>--}}
{{--                                <th class="text-center">--}}
{{--                                    --}}{{--                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">--}}
{{--                                    Del--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr id='addr0' data-id="0" class="hidden">--}}
{{--                                <td data-name="service">--}}
{{--                                    <input type="text" name='service'  placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="description_service">--}}
{{--                                    <input type="text" name='description_service' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="quantidade">--}}
{{--                                    <input type="text" name='quantity' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="service_cost_value">--}}
{{--                                    <input type="text" name="service_cost_value" placeholder="" class="form-control" />--}}
{{--                                </td>--}}
{{--                                <td data-name="discount_service">--}}
{{--                                    <input type="text" name='discount_service' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="subtotal_service">--}}
{{--                                    <input type="text" name='subtotal_service' placeholder='' class="form-control"/>--}}
{{--                                </td>--}}
{{--                                <td data-name="del_service">--}}
{{--                                    <button name="del_service" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <a id="add_new_service" class="btn btn-primary float-right">Adicionar outro serviço</a>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-map-marker-alt"></i> Endereço de entrega--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}


{{--                    ENDEREÇO--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-truck-moving"></i> Transporte--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}


{{--                    TRANSPORTE--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-dollar-sign"></i> Total--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}


{{--                    TOTAL--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-edit"></i> Observações--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="form-row">--}}
{{--                    <div class="col-md-6 mb-3">--}}
{{--                        <i class="fas fa-exclamation-circle"></i> <label class=" font-italic font-weight-bold" for="exampleFormControlNoteClient">Está observação será impressa no pedido.</label>--}}
{{--                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 mb-3">--}}
{{--                        <i class="fas fa-exclamation-circle"></i> <label class="font-italic font-weight-bold" for="exampleFormControlNoteClient">Está observação é de uso interno, portanto não será impressa no pedido.</label>--}}
{{--                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-row mt-2">--}}
{{--                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>--}}
{{--                    <a href="{{ route('order.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--    </form>--}}

@endsection

@section('scriptPages')
    <script src="{{ asset('admin/js/order.js')}}"></script>
@endsection
