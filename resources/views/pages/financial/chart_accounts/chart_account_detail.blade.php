@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-sitemap"></i> Detalhes do plano de contas
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('chart-account.index') }}"> Plano de Contas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do plano de contas</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> Dados Gerais</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>--}}
{{--                </li>--}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                            <tr>
                                <th class="border-top-0" scope="row" >Nome</th>
                                <td class="border-top-0" colspan="2">{{ $chart_account->name }}</td>
                            </tr>
                            <tr>
                                <th class="col-4" scope="row">Movimentação</th>
                                <td colspan="2">{{ $chart_account->type }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Cadastrado por</th>
                                <td colspan="2">{{ $chart_account->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Cadastrado em</th>
                                <td colspan="2">{{ $chart_account->created_at->format('d/m/Y - H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Modificado em</th>
                                <td colspan="2">{{ $chart_account->updated_at->format('d/m/Y - H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('chart-account.edit', ['chart_account' => $chart_account->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>
{{--                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>--}}
{{--                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>--}}
            </div>
        </div>
    </div>

@endsection
