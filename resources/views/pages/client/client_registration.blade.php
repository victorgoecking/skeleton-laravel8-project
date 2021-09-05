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
                        <label for="validationCustomName">Nome</label>
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
                <div class="form-row" id="addAddress0">
                    <div class="col-md-2 mb-3">
                        <label for="customCEP0">CEP</label>
                        <input type="text" class="form-control" name="cep0" id="customCEP0" placeholder="Ex.: 00000-000">
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="validationPublicPlace0">Logradouro</label>
                        <input type="text" class="form-control" name="public_place0" id="validationPublicPlace0" placeholder="Ex.: Rua ...">
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="validationDistrict0">Bairro</label>
                        <input type="text" class="form-control" name="district0" id="validationDistrict0" placeholder="Ex.: Bairro ...">
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="validationCompletemnt0">Complemento</label>
                        <input type="text" class="form-control" name="complement0" id="validationCompletemnt0" placeholder="Ex.: APTO...">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectCity0">Cidade</label>
                        <select class="form-control" name="city0" id="selectCity0">
                            <option value="-" >-</option>
                            <option value="MG">Teofilo Otoni</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectState0">Estado</label>
                        <select class="form-control" name="state0" id="selectState0">
                            <option value="-" >-</option>
                            <option value="Minas Gerais">Minas Gerais</option>
                        </select>
                    </div>

                    <div class="col-md-1 mb-3">
                        <label for="selectUF0">UF</label>
                        <select class="form-control" name="uf0" id="selectUF0">
                            <option value="-" >-</option>
                            <option value="MG">MG</option>
                        </select>
                    </div>

{{--                    <div class="col-md-5 mb-3">--}}
{{--                        <label for="exampleFormControlTextarea1">Observações</label>--}}
{{--                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" placeholder="Observações" rows="3"></textarea>--}}
{{--                    </div>--}}
                </div>

                <div id="addAddress1"></div>

                <button id="addRowAddress" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Inserir novo endereço </button>
                <button id="removeAddress" class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times-circle"></i> Remover ultimo endereço</button>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-bullhorn"></i> Contatos
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="customPhone0">Telefone</label>
                        <input type="text" class="form-control" name="phone0" id="customPhone0" placeholder="Ex.: (00) 0 0000-0000">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="customCellPhone0">Telefone Celular</label>
                        <input type="text" class="form-control" name="cell_phone0" id="customCellPhone0" placeholder="Ex.: (00) 0 0000-0000">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="customWhatsapp0">Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp0" id="customWhatsapp0" placeholder="Ex.: (00) 0 0000-0000">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="validationCustomEmail0">E-mail</label>
                        <input type="email" class="form-control" name="email0" id="validationCustomEmail0" aria-describedby="emailHelp" placeholder="Ex.: email@email.com">
                        <div class="invalid-feedback">
                            Por favor, providencie um e-mail valido.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3" >
                        <label for="customNote0">Observação</label>
                        <input type="text" class="form-control" name="note0" id="customNote0" placeholder="Ex.: Comercial">
                    </div>
                </div>

                <div id="addContact1"></div>

                <button id="addRowContact" class="btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Inserir novo contato </button>
                <button id="removeContact" class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times-circle"></i> Remover ultimo contato</button>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i> Observações
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
{{--                        <label for="exampleFormControlNote">Observações</label>--}}
                        <textarea class="form-control" name="note" id="exampleFormControlNote" placeholder="Observações" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                </div>
            </div>
        </div>

    </form>
@endsection
