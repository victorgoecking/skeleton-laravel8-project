@extends('layouts.master')

@section('content')
{{--    <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-user"></i> Usuários</h1>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

             <h4 class="m-0 font-weight-bold text-primary">
                <i class="fa fa-users"></i> Usuários  &nbsp;&nbsp;
                 <a href="{{ route('user.create') }}">
                     <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Novo
                    </button>
                 </a>
            </h4>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
{{--                    <thead class="thead-light">--}}
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nome de Usuário</th>
                            <th>E-mail</th>
                            <th>Observação</th>
                            <th>Nível</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nome de Usuário</th>
                            <th>E-mail</th>
                            <th>Observação</th>
                            <th>Nível</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->note}}</td>
                            <td>{{$user->level}}</td>
                            <td class="pt-2">
{{--                                <button class="btn btn-info btn-sm py-0 px-1 mt-1" data-toggle="modal" data-placement="top" title="Ver" data-target="#modalUserDetail"><i class="far fa-eye"></i></button>--}}
                                <a href="{{ route('user.show', ['user' => $user->id]) }}"><button class="btn btn-info btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Ver"><i class="far fa-eye"></i></button></a>
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}"><button class="btn btn-warning btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></button></a>
{{--                                <a href="{{ route('user.show', ['user' => $user->id]) }}"><button class="btn btn-secondary btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Desabilitar"><i class="fas fa-user-slash"></i></button></a>--}}
                                <a href="{{ route('user.destroy', ['user' => $user->id]) }}"><button class="btn btn-danger btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Remover"><i class="far fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- Modal User Detail -->
    <div class="modal fade" id="modalUserDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
