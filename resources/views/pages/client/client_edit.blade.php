@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Edição de cliente
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}"> Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edição de cliente</li>
            </ol>
        </nav>
    </div>

    <form id="formClient" class="needs-validation" method="POST" action="{{ route('client.update', ['client' => $client->id]) }}" novalidate>

        @csrf
        @method('put')

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">
                    <input type="hidden" class="form-control" name="id" value="{{ $client->id }}">

                    <div class="col-md-2 mb-3">
                        <label for="selectPersonType">Tipo Pessoa</label>
                        <select class="form-control" name="person_type" id="selectPersonType">
                            <option value="PF" {{ $client->person_type == 'PF' ? 'selected': '' }}>Pessoa Física</option>
                            <option value="PJ" {{ $client->person_type == 'PJ' ? 'selected': '' }}>Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomName">Nome *</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" value="{{ $client->name }}" placeholder="Nome Completo" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o nome do cliente.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3" id="divCPF">
                        <label for="customCPF">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="customCPF" aria-describedby="cpfHelp" value="{{ $client->cpf }}" MAXLENGTH="14" placeholder="Ex.: 000.000.000-00">
                    </div>
                    <div class="col-md-5 mb-3" id="divCNPJ">
                        <label for="customCNPJ">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="customCNPJ" aria-describedby="cnpjHelp" value="{{ $client->cnpj }}" MAXLENGTH="18" placeholder="Ex.: 00.000.000/0000-00">
                    </div>
                </div>

                <div class="form-row">

                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3" id="divCorporateReason">
                        <label for="validationCorporateReason">Razão Social</label>
                        <input type="text" class="form-control" name="corporate_reason" id="validationCorporateReason" value="{{ $client->corporate_reason }}" placeholder="Razão Social">
                    </div>

                    <div class="col-md-6 mb-3" id="divFantasyName">
                        <label for="validationFantasyName">Nome Fantasia</label>
                        <input type="text" class="form-control" name="fantasy_name" id="validationFantasyName" value="{{ $client->fantasy_name }}" placeholder="Nome Fantasia">
                    </div>

                    <div class="col-md-2 mb-3" id="divSex">
                        <label for="selectSex">Sexo</label>
                        <select class="form-control" name="sex" id="selectSex">
                            <option value="-">-</option>
                            <option value="M" {{ $client->sex == 'M' ? 'selected': '' }}>Masculino</option>
                            <option value="F" {{ $client->sex == 'F' ? 'selected': '' }}>Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3" id="divBirthDate">
                        <label for="customBirthDate">Data de Nascimento</label>
                        <input type="date" class="form-control" name="birth_date" id="customBirthDate" aria-describedby="birthDateHelp" value="{{ $client->birth_date ? $client->birth_date->format('Y-m-d') : null }}" placeholder="Ex.: ---">
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i> Endereços
            </div>
            <div class="card-body">

                @foreach($client->address as $address)

                    <input type="hidden" name="address_id[]" value="{{ $address->id }}" />

                    <input type="hidden" class="countAddressForDelete" name="countAddressForDelete[]" value="" />

                    <input type="hidden" class="countAddress" name="countAddress" value="{{ $address->id }}" />

                    <div id="addAddress{{ $address->id }}">

{{--                        @if($client->address[0]->id != $address->id)--}}
                            <hr class="bg-secondary">
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <button  id="{{ $address->id }}" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_address" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>
                            </div>
{{--                        @endif--}}

                        <div class="form-row">
                            {{--                <div class="form-row" id="addAddress0">--}}
                            <div class="col-md-2 mb-3">
                                <label for="customCEP{{ $address->id }}">CEP</label>
                                <input type="text" class="form-control" name="cep[]" id="customCEP{{ $address->id }}" value="{{ $address->cep }}" MAXLENGTH="9" placeholder="Ex.: 00000-000">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationPublicPlace{{ $address->id }}">Logradouro *</label>
                                <input type="text" class="form-control" name="public_place[]" id="validationPublicPlace{{ $address->id }}" value="{{ $address->public_place }}" data-toggle="tooltip" data-placement="top" title="Logradouro obrigatório para cadastro de endereço. Caso vazio, o endereço será desconsiderado." placeholder="Ex.: Rua ..." required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="validationNumber{{ $address->id }}">Número</label>
                                <input type="text" class="form-control" name="number[]" id="validationNumber{{ $address->id }}" value="{{ $address->number }}" placeholder="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationDistrict{{ $address->id }}">Bairro</label>
                                <input type="text" class="form-control" name="district[]" id="validationDistrict{{ $address->id }}" value="{{ $address->district }}" placeholder="Ex.: Bairro ...">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationComplement{{ $address->id }}">Complemento</label>
                                <input type="text" class="form-control" name="complement[]" id="validationComplement{{ $address->id }}" value="{{ $address->complement }}" placeholder="Ex.: APTO...">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="selectCity{{ $address->id }}">Cidade</label>
                                <select class="form-control" name="city[]" id="selectCity{{ $address->id }}">
                                    <option value="-" >-</option>
                                    <option value="2367" {{ $address->city == 'Teofilo Otoni' ? 'selected' : ''}}>Teofilo Otoni</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="selectState{{ $address->id }}">Estado</label>
                                <select class="form-control" name="state[]" id="selectState{{ $address->id }}">
                                    <option value="-" >-</option>
                                    <option value="Minas Gerais" {{ $address->state == 'Minas Gerais' ? 'selected' : ''}}>Minas Gerais</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="customNoteAddress{{ $address->id }}">Observação</label>
                                <input type="text" class="form-control" name="note_address[]" id="customNoteAddress{{ $address->id }}" value="{{ $address->note }}" placeholder="Ex.: Endereço de entrega">
                            </div>
                        </div>
                    </div>

                @endforeach

                <div id="addAddressLast"></div>

                <button id="addRowAddress" class="btn btn-dark" type="button"><i class="fas fa-plus-circle"></i> Inserir novo endereço </button>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-bullhorn"></i> Contatos
            </div>
            <div class="card-body">

                @foreach($client->contact as $contact)

                    <input type="hidden" name="contact_id[]" value="{{ $contact->id }}" />

                    <input type="hidden" class="countContactForDelete" name="countContactForDelete[]" value="" />

                    <input type="hidden" class="countContact" name="countContact" value="{{ $contact->id }}" />
                    <div id="addContact{{ $contact->id }}">

                        @if($client->contact[0]->id != $contact->id)
                            <hr class="bg-secondary">
                            <div class="d-flex flex-row-reverse bd-highlight">
                                <button  id="{{ $contact->id }}" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_contact" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="customPhone{{ $contact->id }}">Telefone</label>
                                <input type="text" class="form-control" name="phone[]" id="customPhone{{ $contact->id }}" MAXLENGTH="14" value="{{ $contact->phone }}" placeholder="Ex.: (00) 0 0000-0000">
                            </div>

                            <div class="col-md-4 mb-3">

                                @if($client->contact[0]->id != $contact->id)
                                    <label for="customCellPhone{{ $contact->id }}">Telefone Celular</label>
                                    <input type="text" class="form-control" name="cell_phone[]" id="customCellPhone{{ $contact->id }}" MAXLENGTH="16" value="{{ $contact->cell_phone }}" placeholder="Ex.: (00) 0 0000-0000">
                                @else
                                    <label for="customCellPhone{{ $contact->id }}">Telefone Celular *</label>
                                    <input type="text" class="form-control" name="cell_phone[]" id="customCellPhone{{ $contact->id }}" MAXLENGTH="16" value="{{ $contact->cell_phone }}" placeholder="Ex.: (00) 0 0000-0000" required>
                                @endif

                                <div class="invalid-feedback">
                                    Por favor, informe um telefone para contato.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="customWhatsapp{{ $contact->id }}">Whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp[]" id="customWhatsapp{{ $contact->id }}" MAXLENGTH="20" value="{{ $contact->whatsapp }}" placeholder="Ex.: (00) 0 0000-0000">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustomEmail{{ $contact->id }}">E-mail</label>
                                <input type="email" class="form-control" name="email[]" id="validationCustomEmail{{ $contact->id }}" aria-describedby="emailHelp" value="{{ $contact->email }}" placeholder="Ex.: email@email.com">
                                <div class="invalid-feedback">
                                    Por favor, providencie um e-mail valido.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3" >
                                <label for="customNoteContact{{ $contact->id }}">Observação</label>
                                <input type="text" class="form-control" name="note_contact[]" id="customNoteContact{{ $contact->id }}" value="{{ $contact->note }}" placeholder="Ex.: Comercial">
                            </div>
                        </div>
                    </div>

                @endforeach

                <div id="addContactLast"></div>

                <button id="addRowContact" class="btn btn-dark" type="button"><i class="fas fa-plus-circle"></i> Inserir novo contato </button>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i> Observações
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        {{--                        <label for="exampleFormControlNoteClient">Observações</label>--}}
                        <textarea class="form-control" name="note_client" id="exampleFormControlNoteClient" placeholder="Observações" rows="5">{{ $client->note }}</textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check-circle"></i> Atualizar</button>
                    <a href="{{ route('client.index') }}"><button class="btn btn-danger ml-2" type="button"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>

    </form>

@endsection

@section('scriptPages')
    <script src="{{ asset('admin/js/client.js')}}"></script>
@endsection
