@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-tools"></i> Cadastro de serviço
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service.index') }}"> Serviço</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de serviço</li>
            </ol>
        </nav>
    </div>

    <form id="formService" class="needs-validation" method="POST" action="{{ route('service.store') }}" novalidate>
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomNameService">Nome do serviço*</label>
                        <input type="text" class="form-control" name="name" id="validationCustomNameService" placeholder="Nome do serviço" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o nome do serviço.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustomServiceValue">Valor do serviço *</label>
                        <input type="text" class="form-control" name="service_cost_value" id="validationCustomServiceValue" placeholder="0,00" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o valor do serviço.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="exampleFormControlDescriptionService">Descrição</label>
                        <textarea class="form-control" name="description" id="exampleFormControlDescriptionService" placeholder="Descrição do serviço" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-row mt-4">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('service.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>

    </form>

@endsection

{{--@section('scriptPages')--}}
{{--    <script src="{{ asset('admin/js/service.js')}}"></script>--}}
{{--@endsection--}}
