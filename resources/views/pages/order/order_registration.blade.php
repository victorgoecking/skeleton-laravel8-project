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
                        <select class="form-control" name="budget" id="selectOrderType">
                            <option value="1" selected>Orçamento</option>
                            <option value="0">Venda</option>
                        </select>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="validationCustomClient">Cliente *</label>
                        <input type="text" class="form-control" name="client_id" id="validationCustomClient" placeholder="" required>
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
                <div class="form-row">


                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                            <thead>
                            <tr >
                                <th class="text-center">
                                    Produto *
                                </th>
                                <th class="text-center">
                                    Quantidade
                                </th>
                                <th class="text-center">
                                    Valor *
                                </th>
                                <th class="text-center">
                                    Desconto
                                </th>
                                <th class="text-center">
                                    Subtotal
                                </th>
                                <th class="text-center">
{{--                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">--}}
                                    Del
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id='addr0' data-id="0" class="hidden">
                                <td data-name="produto">
                                    <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                </td>
                                <td data-name="quantidade">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="valor">
                                    <input name="desc0" placeholder="Description" class="form-control"></input>
                                </td>
                                <td data-name="desconto">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="subtotal">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="del">
                                    <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <a id="add_row" class="btn btn-primary float-right">Add Row</a>


                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-tools"></i> Serviços
            </div>
            <div class="card-body">
                <div class="form-row">


                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                            <thead>
                            <tr >
                                <th class="text-center">
                                    Produto *
                                </th>
                                <th class="text-center">
                                    Quantidade
                                </th>
                                <th class="text-center">
                                    Valor *
                                </th>
                                <th class="text-center">
                                    Desconto
                                </th>
                                <th class="text-center">
                                    Subtotal
                                </th>
                                <th class="text-center">
                                    {{--                                <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">--}}
                                    Del
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id='addr0' data-id="0" class="hidden">
                                <td data-name="produto">
                                    <input type="text" name='name0'  placeholder='Name' class="form-control"/>
                                </td>
                                <td data-name="quantidade">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="valor">
                                    <input name="desc0" placeholder="Description" class="form-control"></input>
                                </td>
                                <td data-name="desconto">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="subtotal">
                                    <input type="text" name='mail0' placeholder='Email' class="form-control"/>
                                </td>
                                <td data-name="del">
                                    <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <a id="add_row" class="btn btn-primary float-right">Add Row</a>


                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i> Endereço de entrega
            </div>
            <div class="card-body">
                <div class="form-row">


                    ENDEREÇO


                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-truck-moving"></i> Transporte
            </div>
            <div class="card-body">
                <div class="form-row">


                    TRANSPORTE


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
                    <div class="col-md-6 mb-3">
                        <i class="fas fa-exclamation-circle"></i> <label class=" font-italic font-weight-bold" for="exampleFormControlNoteClient">Está observação será impressa no pedido.</label>
                        <textarea class="form-control" name="note_order" id="exampleFormControlNoteOrder" rows="5"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <i class="fas fa-exclamation-circle"></i> <label class="font-italic font-weight-bold" for="exampleFormControlNoteClient">Está observação é de uso interno, portanto não será impressa no pedido.</label>
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
    <script src="{{ asset('admin/js/order.js')}}"></script>
@endsection
