@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user"></i> Detalhes recebimento
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bills-receive.index') }}"> Contas a receber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes recebimento</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-fw fa-list-alt"></i> Dados Gerais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="form_payment-tab" data-toggle="tab" href="#form_payment" role="tab" aria-controls="form_payment" aria-selected="false"><i class="fas fa-file-invoice-dollar"></i> Formas de pagamento</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <table class=" border-top-0 mt-0 table table-bordered">

                        <tbody>
                        <tr>
                            <th class="border-top-0" scope="row" >Nº do pedido</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->id }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Descrição do recebimento</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->description}}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Situação</th>
                            @if( $bills_receive->situation === "Atrasado")
                                <td class="border-top-0" colspan="1"><span class="badge badge-danger">{{$bills_receive->situation}}</span></td>
                            @else
                                @if($bills_receive->situation === "Em aberto")
                                    <td class="border-top-0" colspan="1"><span class="badge badge-info">{{$bills_receive->situation}}</span></td>
                                @else
                                    <td class="border-top-0" colspan="1"><span class="badge badge-primary">{{$bills_receive->situation}}</span></td>
                                @endif
                            @endif
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Valor</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->gross_value }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Data do vencimento</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->due_date->format('d/m/Y') }}</td>
                        </tr>
                        @if($bills_receive->clearing_date)
                            <tr>
                                <th class="border-top-0" scope="row" >Data da compensação</th>
                                <td class="border-top-0" colspan="1">{{ $bills_receive->clearing_date->format('d/m/Y') }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th class="border-top-0" scope="row" >Formas de pagamento</th>
                            <td class="border-top-0" colspan="1">
                                @foreach($bills_receive->form_payment_cash_movements as $form_payment)
                                    {{ $form_payment->description }} /
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Observações</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->note }}</td>
                        </tr>
                        <tr>
                            <th class="border-top-0" scope="row" >Cadastrado por</th>
                            <td class="border-top-0" colspan="1">{{ $bills_receive->user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Criado em</th>
                            <td colspan="1">{{ $bills_receive->created_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Modificado em</th>
                            <td colspan="1">{{ $bills_receive->updated_at->format('d/m/Y - H:i:s') }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-warning btn-md" href="#" role="button"><i class="fas fa-edit"></i> Editar</a>
{{--                    <a class="btn btn-warning btn-md" href="{{ route('bills-receive.edit', ['bills_receive' => $bills_receive->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>--}}
                </div>

                <div class="tab-pane fade" id="form_payment" role="tabpanel" aria-labelledby="form_payment-tab">
                    <div class="border-top-0 table-responsive">
                        <table class="border-top-0 mt-0 table table-bordered">
                            <thead>
                            <tr>
                                <th class="border-top-0" scope="col">Forma de pagamento</th>
                                <th class="border-top-0" scope="col">valor</th>
                                <th class="border-top-0" scope="col">Pago</th>
                                <th class="border-top-0" scope="col">Observação</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($form_payment_cash_movements as $form_payment_cash_movement)
                                <tr>
                                    <td class="border-top-0" >{{ $form_payment_cash_movement->form_payments->description }}</td>
                                    <td class="border-top-0" >{{ $form_payment_cash_movement->value }}</td>
                                    <td class="border-top-0" >
                                        @if($form_payment_cash_movement->paid == '1')
                                            <span class="badge badge-primary">Sim</span>
                                        @else
                                            <span class="badge badge-danger">Não</span>
                                        @endif
                                    </td>
                                    <td class="border-top-0" >{{ $form_payment_cash_movement->note }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-warning btn-md" href="#" role="button"><i class="fas fa-edit"></i> Editar</a>
{{--                    <a class="btn btn-warning btn-md" href="{{ route('bills-receive.edit', ['bills-receive' => $bills->receive->id]) }}" role="button"><i class="fas fa-edit"></i> Editar</a>--}}
                </div>


            </div>
        </div>
    </div>

@endsection
