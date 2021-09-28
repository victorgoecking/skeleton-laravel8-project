@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fa fa-users"></i> Pedidos&nbsp;
            <a href="{{ route('order.create') }}">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Novo
                </button>
            </a>
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
{{--                    <thead class="thead-light">--}}
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Tipo</th>
{{--                            <th>Cadastrado em</th>--}}
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Tipo</th>
{{--                            <th>Cadastrado em</th>--}}
                            <th>Opções</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client->first()->name }}</td>
                            <td>{{ $order->order_date->format('d/m/Y') }}</td>
                            <td>{{ $order->total }}</td>
                            @if( $order->budget === 1)
                                <td><span class="badge badge-info">Orçamento</span></td>
                            @else
                                <td><span class="badge badge-primary">Venda</span></td>
                            @endif

{{--                            <td>{{ $order->created_at->format('d/m/Y - H:i:s') }}</td>--}}

                            <td class="pt-2">
{{--                                {{ route('order.show', ['order' => $order->id]) }}--}}
                                <a href=""><button class="btn btn-info btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Detalhes"><i class="far fa-eye"></i></button></a>
{{--                                {{ route('order.edit', ['order' => $order->id]) }}--}}
                                <a href=""><button class="btn btn-warning btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></button></a>
{{--                                {{ route('order.destroy', ['order' => $order->id]) }}--}}
                                <form class="d-inline" action="" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick='return confirm(`Deseja realmente excluir o pedido de numero" {{ $order->id }} "?`)' class="btn btn-danger btn-sm py-0 px-1 mt-1" data-toggle="tooltip" data-placement="top" title="Remover"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


{{--    @if(isset($_GET['modal']))--}}
{{--        <!-- Modal User Detail -->--}}
{{--        <div class="modal fade" id="modalUserDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLongTitle">Detalhes do Usuário</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="jumbotron text-center">--}}
{{--                            <h1 class="display-4">{{ $user->name }}</h1>--}}
{{--                            <p class="lead"><b>Nome de Usuário:</b> {{ $user->username }}</p>--}}
{{--                            <p class="lead"><b>E-mail:</b> {{ $user->email }}</p>--}}
{{--                            <p class="lead"><b>Observação:</b> {{ $user->note }}</p>--}}
{{--                            <p class="lead"><b>Nivel:</b> {{ $user->level }}</p>--}}
{{--                            <hr class="my-4">--}}
{{--                            <p><b>Criado em:</b> {{ $user->created_at }}</p>--}}
{{--                            <p class="lead">--}}
{{--                                <a class="btn btn-warning btn-lg" href="{{ route('user.edit', ['user' => $user->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection
