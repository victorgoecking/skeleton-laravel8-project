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

    </form>

@endsection

@section('scriptPages')
    <script src="{{ asset('admin/js/order.js')}}"></script>
@endsection
