@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user"></i> Detalhes do cliente
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}"> Cliente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do cliente</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Endereços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contatos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0" scope="row" >Nome</th>
                            <td class="border-top-0" colspan="1">{{ $client->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nome de Usuário</th>
                            <td colspan="1">{{ $client->username }}</td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail</th>
                            <td colspan="1">{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Observação</th>
                            <td colspan="1">{{ $client->note }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nivel</th>
                            <td colspan="1">{{ $client->level ==  2 ?  'Administrador' : 'Atendente' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Criado em</th>
                            <td colspan="1">{{ $client->created_at }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Modificado em</th>
                            <td colspan="1">{{ $client->updated_at }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="{{ route('client.edit', ['client' => $client->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>
                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    </div>

@endsection
