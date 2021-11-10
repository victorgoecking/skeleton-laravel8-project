@extends('pages.financial.cash_flow.cash_flow')

@section('content-cash-flow')


    <div class="container mb-4 p-0">
        <div class="row justify-content-end">
            <div class="col-12 d-flex justify-content-end">
                <h2 class="h3 mb-0 shadow rounded p-4 bg-gray-300 text-gray-800"> Saldo real no caixa:
                    @if($actual_cash_balance->balance <= 0)
{{--                                <span class="badge badge-custom-price-success p-3">R$ {{$actual_cash_balance->balance}}</span>--}}
                        <span class="text-custom-price-success">R$ {{$actual_cash_balance->balance}}</span>
                    @else
{{--                                <span class="badge badge-custom-price-danger p-3">R$ -{{$actual_cash_balance->balance}}</span>--}}
                        <span class="text-custom-price-danger">R$ -{{$actual_cash_balance->balance}}</span>
                    @endif
                </h2>
            </div>
        </div>
    </div>

    <h3 class="h4 mb-0 text-gray-800 mb-4">
        <i class="fas fa-cash-register"></i>&ensp;Movimentações do caixa no dia {{today()->format('d/m/Y')}}
    </h3>

    @foreach($cash_movements as $cash_movement)

        <h5 class="h5 text-gray-800"> {{$cash_movement->chartAccount->name}}</h5>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr >
{{--                            <th style="width: 15%">--}}
                            <th>
                                Forma de pagamento
                            </th>
                            <th>
                                {{$cash_movement->situation}}
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
    {{--                                <td class="text-custom-price-success font-weight-bold">{{ $total_pay_x_receive_current }}</td>--}}
    {{--                                    <td class="text-custom-price-success font-weight-bold">{{ $cash_movement->form_payments }}</td>--}}
                                @foreach($cash_movement->formPaymentCashMovements as $formPaymentCashMovements)
                                    @if($formPaymentCashMovements->form_payment_id == 6)
                                        <td class="text-custom-price-success font-weight-bold">{{ $formPaymentCashMovements->form_payment_id }}</td>
                                        <td class="text-custom-price-success font-weight-bold">{{ $cash_movement->description }}</td>
                                        <td class="text-custom-price-success font-weight-bold">{{ $formPaymentCashMovements->value }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('scriptPages')

    <script type="text/javascript">

        $(document).ready(function() {
            $('.activeTabs').removeClass('active');
            $('#cashier-tab').addClass('active');
        });

        $(document).ready(function() {
            $('#dataTable').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
                },
            });
        });

    </script>
@endsection
