@extends('layouts.master')

@section('content')
{{--    <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-user"></i> Tables</h1>--}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary"><i class="fa fa-user"></i> Cadastro de usuário</h4>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomName">Nome</label>
                        <input type="text" class="form-control" name="name" id="validationCustomName" placeholder="Nome" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, digite seu nome.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomEmail">E-mail</label>
                        <input type="email" class="form-control" id="validationCustomEmail" aria-describedby="emailHelp" placeholder="E-mail" required>
                        <div class="invalid-feedback">
                            Por favor, providencie um e-mail valido.
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <label for="validationCustomUsername">Nome de usuário</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Nome que será usado para entrar no sistema" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Por favor, escolha um nome de usuário.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustomPassword">Senha</label>
                        <input type="password" class="form-control" id="validationCustomPassword" placeholder="Senha" required>
                        <div class="invalid-feedback">
                            Por favor, providencie um senha valida.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlSelect1">Nível de acesso</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected>Atendente</option>
                            <option>Administrador</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleFormControlTextarea1">Observações</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" placeholder="Observações" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
