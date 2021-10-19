@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-chart-bar"></i> Fluxo de Caixa
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bills-pay.index') }}"> Contas a pagar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes pagamento</li>
            </ol>
        </nav>
    </div>


{{--            <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
    <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link activeTabs" id="balance-tab" href="{{ route('balance') }}" ><i class="fas fa-balance-scale-right"></i> Saldo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link activeTabs" id="abstract-tab" href="{{ route('abstract') }}"><i class="fas fa-poll-h"></i> Resumo</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        @yield('content-cash-flow')
    </div>


@endsection
