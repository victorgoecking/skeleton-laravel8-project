@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-user"></i> Cadastro de cliente
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}"></i> Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cadastro de cliente</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="needs-validation" method="POST" action="{{ route('client.store') }}" novalidate>

                @csrf

                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="exampleFormControlSelectPersonType">Tipo Pessoa</label>
                        <select class="form-control" name="person_type" id="exampleFormControlSelectPersonType">
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
                            Por favor, digite seu nome.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomCPF">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="validationCustomCPF" aria-describedby="cpfHelp" placeholder="Ex.: 000.000.000-00" required>
                        <div class="invalid-feedback">
                            Por favor, providencie um CPF valido.
                        </div>
                    </div>
                </div>
                <div class="form-row">

                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="exampleFormControlSelectSex">Sexo</label>
                        <select class="form-control" name="sex" id="exampleFormControlSelectSex">
                            <option value="-" selected>-</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustomBirthDate">Data de Nascimento</label>
                        <input type="text" class="form-control" name="bird_date" id="validationCustomBirthDate" aria-describedby="birdDateHelp" placeholder="Ex.: ---" required>
                        <div class="invalid-feedback">
                            Por favor, providencie um CPF valido.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="exampleFormControlTextarea1">Observações</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" placeholder="Observações" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
