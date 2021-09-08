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
                        {{--                            CONDICAO PESSOA FISICA--}}
                        @if($client->person_type  ==  'PF')
                            <tr>
                                <th scope="row">Tipo pessoa</th>
                                <td colspan="1">Pessoa Física</td>
                            </tr>

                            <tr>
                                <th scope="row">CPF</th>
                                <td colspan="1">{{  $client->cpf  }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sexo</th>
                                @switch($client->sex)
                                    @case('M')
                                        <td colspan="1">Masculino</td>
                                        @break
                                    @case('F')
                                        <td colspan="1">Feminino</td>
                                        @break
                                    @default
                                        <td colspan="1"></td>
                                @endswitch
                            </tr>
                            <tr>
                                <th scope="row">Data de nascimento</th>
                                <td colspan="1">{{ $client->birth_date ? $client->birth_date->format('Y-m-d') : null }}</td>
                            </tr>

                        @else

                            <tr>
                                <th scope="row">Tipo pessoa</th>
                                <td colspan="1">Pessoa Jurídica</td>
                            </tr>

                            <tr>
                                <th scope="row">CNPJ</th>
                                <td colspan="1">{{  $client->cnpj  }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Razão social</th>
                                <td colspan="1">{{ $client->corporate_reason }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nome fantasia</th>
                                <td colspan="1">{{ $client->fantasy_name }}</td>
                            </tr>

                        @endif

                        <tr>
                            <th scope="row">Observações</th>
                            <td colspan="1">{{ $client->note }}</td>
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

                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <div class="border-top-0 table-responsive">
                        <table class="border-top-0 mt-0 table table-bordered">
                            <thead>
                            <tr>
                                <th class="border-top-0" scope="col">CEP</th>
                                <th class="border-top-0" scope="col">Logradouro</th>
                                <th class="border-top-0" scope="col">Nº</th>
                                <th class="border-top-0" scope="col">Bairro</th>
                                <th class="border-top-0" scope="col">Complemento</th>
                                <th class="border-top-0" scope="col">Cidade/UF</th>
                                <th class="border-top-0" scope="col">Estado</th>
                                <th class="border-top-0" scope="col">Observação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($client->address as $address)
                                <tr>
                                    <td class="border-top-0" >{{ $address->cep }}</td>
                                    <td class="border-top-0" >{{ $address->public_place }}</td>
                                    <td class="border-top-0" >{{ $address->number }}</td>
                                    <td class="border-top-0" >{{ $address->disctrict }}</td>
                                    <td class="border-top-0" >{{ $address->complement }}</td>
                                    <td class="border-top-0" >{{ $address->city }}-{{ $address->uf }}</td>
                                    <td class="border-top-0" >{{ $address->state }}</td>
                                    <td class="border-top-0" >{{ $address->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-warning btn-md" href="{{ route('client.edit', ['client' => $client->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="border-top-0 table-responsive">
                        <table class="border-top-0 mt-0 table table-bordered">
                            <thead>
                            <tr>
                                <th class="border-top-0" scope="col">Email</th>
                                <th class="border-top-0" scope="col">Telefone</th>
                                <th class="border-top-0" scope="col">Celular</th>
                                <th class="border-top-0" scope="col">Whatsapp</th>
                                <th class="border-top-0" scope="col">Observação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($client->contact as $contact)
                                <tr>
                                    <td class="border-top-0" >{{ $contact->email }}</td>
                                    <td class="border-top-0" >{{ $contact->phone }}</td>
                                    <td class="border-top-0" >{{ $contact->cell_phone }}</td>
                                    <td class="border-top-0" >{{ $contact->whatsapp }}</td>
                                    <td class="border-top-0" >{{ $contact->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-warning btn-md" href="{{ route('client.edit', ['client' => $client->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>
                </div>

            </div>
        </div>
    </div>

@endsection
