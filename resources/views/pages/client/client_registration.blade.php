@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Cadastro de cliente
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}"> Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de cliente</li>
            </ol>
        </nav>
    </div>

    <form id="formClient" class="needs-validation" method="POST" action="{{ route('client.store') }}" novalidate>
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <div class="col-md-2 mb-3">
                        <label for="selectPersonType">Tipo Pessoa</label>
                        <select class="form-control" name="person_type" id="selectPersonType">
                            <option value="PF" selected>Pessoa Física</option>
                            <option value="PJ">Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomName">Nome *</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" placeholder="Nome Completo" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o nome do cliente.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3" id="divCPF">
                        <label for="customCPF">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="customCPF" aria-describedby="cpfHelp" placeholder="Ex.: 000.000.000-00">
                    </div>
                    <div class="col-md-5 mb-3" id="divCNPJ">
                        <label for="customCNPJ">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" id="customCNPJ" aria-describedby="cnpjHelp" placeholder="Ex.: 00.000.000/0000-00">
                    </div>
                </div>

                <div class="form-row">

                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3" id="divCorporateReason">
                        <label for="validationCorporateReason">Razão Social</label>
                        <input type="text" class="form-control" name="corporate_reason" id="validationCorporateReason" placeholder="Razão Social">
                    </div>

                    <div class="col-md-6 mb-3" id="divFantasyName">
                        <label for="validationFantasyName">Nome Fantasia</label>
                        <input type="text" class="form-control" name="fantasy_name" id="validationFantasyName" placeholder="Nome Fantasia">
                    </div>

                    <div class="col-md-2 mb-3" id="divSex">
                        <label for="selectSex">Sexo</label>
                        <select class="form-control" name="sex" id="selectSex">
                            <option value="-" selected>-</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3" id="divBirdDate">
                        <label for="customBirthDate">Data de Nascimento</label>
                        <input type="text" class="form-control" name="bird_date" id="customBirthDate" aria-describedby="birdDateHelp" placeholder="Ex.: ---">
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-map-marker-alt"></i> Endereços
            </div>
            <div class="card-body">
                <div class="form-row">
{{--                <div class="form-row" id="addAddress0">--}}
                    <div class="col-md-2 mb-3">
                        <label for="customCEP1">CEP</label>
                        <input type="text" class="form-control" name="cep[]" id="customCEP1" placeholder="Ex.: 00000-000">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationPublicPlace1">Logradouro</label>
                        <input type="text" class="form-control" name="public_place[]" id="validationPublicPlace1" data-toggle="tooltip" data-placement="top" title="Logradouro obrigatório para cadastro de endereço. Caso vazio, o endereço será desconsiderado." placeholder="Ex.: Rua ...">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="validationNumber1">Número</label>
                        <input type="text" class="form-control" name="number[]" id="validationNumber1" placeholder="">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationDistrict1">Bairro</label>
                        <input type="text" class="form-control" name="district[]" id="validationDistrict1" placeholder="Ex.: Bairro ...">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCompletemnt1">Complemento</label>
                        <input type="text" class="form-control" name="complement[]" id="validationCompletemnt1" placeholder="Ex.: APTO...">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="selectCity1">Cidade</label>
                        <select class="form-control" name="city[]" id="selectCity1">
                            <option value="-" >-</option>
                            <option value="MG">Teofilo Otoni</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="selectState1">Estado</label>
                        <select class="form-control" name="state[]" id="selectState1">
                            <option value="-" >-</option>
                            <option value="Minas Gerais">Minas Gerais</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="selectUF1">UF</label>
                        <select class="form-control" name="uf[]" id="selectUF1">
                            <option value="-" >-</option>
                            <option value="MG">MG</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="customNoteAddress1">Observação</label>
                        <input type="text" class="form-control" name="note_address[]" id="customNoteAddress1" placeholder="Ex.: Endereço de entrega">
                    </div>
                </div>

                <div id="addAddress1"></div>

                <button id="addRowAddress" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Inserir novo endereço </button>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-bullhorn"></i> Contatos
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="customPhone1">Telefone</label>
                        <input type="text" class="form-control" name="phone[]" id="customPhone1" placeholder="Ex.: (00) 0 0000-0000">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="customCellPhone1">Telefone Celular *</label>
                        <input type="text" class="form-control" name="cell_phone[]" id="customCellPhone1" placeholder="Ex.: (00) 0 0000-0000" required>
                        <div class="invalid-feedback">
                            Por favor, informe um telefone para contato.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="customWhatsapp1">Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp[]" id="customWhatsapp1" placeholder="Ex.: (00) 0 0000-0000">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email[]" id="validationCustomEmail1" aria-describedby="emailHelp" placeholder="Ex.: email@email.com">
                        <div class="invalid-feedback">
                            Por favor, providencie um e-mail valido.
                        </div>
                    </div>

                    <div class="col-md-6 mb-3" >
                        <label for="customNoteContact1">Observação</label>
                        <input type="text" class="form-control" name="note_contact[]" id="customNoteContact1" placeholder="Ex.: Comercial">
                    </div>
                </div>

                <div id="addContact1"></div>

                <button id="addRowContact" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Inserir novo contato </button>

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
                        <textarea class="form-control" name="note_client" id="exampleFormControlNoteClient" placeholder="Observações" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                </div>
            </div>
        </div>

    </form>
@endsection
