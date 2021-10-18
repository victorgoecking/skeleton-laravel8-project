@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-tools"></i> Detalhes do serviço
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service.index') }}"> Serviço</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do serviço</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> Dados Gerais</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Nome do serviço</th>
                            <td class="border-top-0" colspan="1">{{ $service->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0 col-4" scope="row" >Valor do serviço</th>
                            <td class="border-top-0" colspan="1">{{ $service->service_cost_value }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Descrição</th>
                            <td class="border-top-0" colspan="1">{{ $service->description }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado por</th>
                            <td class="border-top-0" colspan="1">{{ $service->user->first()->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado em</th>
                            <td class="border-top-0" colspan="1">{{ $service->created_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Modificado em</th>
                            <td class="border-top-0" colspan="1">{{ $service->updated_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>

                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('service.edit', ['service' => $service->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

            </div>
        </div>
    </div>

@endsection
