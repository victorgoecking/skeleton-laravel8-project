@extends('pages.financial.cash_flow.cash_flow')

@section('content-cash-flow')

    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="h3 mb-3 text-gray-800"> Pagamentos X Recebimentos</h2>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="" scope="row" >Total atual:</th>
                            @if($total_pay_x_receive_current > 0)
                                <td class="text-custom-price-success font-weight-bold">{{ $total_pay_x_receive_current }}</td>
                            @else
                                <td class="text-custom-price-danger font-weight-bold">{{ $total_pay_x_receive_current }}</td>
                            @endif
                        </tr>
                        <tr>
                            <th class="" scope="row" >Total final previsto:</th>
                            @if($total_pay_x_receive_foreseen > 0)
                                <td class="text-custom-price-success font-weight-bold">{{ $total_pay_x_receive_foreseen }}</td>
                            @else
                                <td class="text-custom-price-danger font-weight-bold">{{ $total_pay_x_receive_foreseen }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="h3 mb-3 text-gray-800"> Recebimentos</h2>
            <div class="table-responsive">
                <table class=" table table-sm table-bordered">
                    <thead>
                    <tr >
                        <th style="width: 15%">
                            Data
                        </th>
                        <th>
                            Descrição do recebimento
                        </th>
                        <th>
                            Plano de contas
                        </th>
                        <th style="width: 15%" class="text-center">
                            Situação
                        </th>
                        <th class="text-right" style="width: 20%">
                            Valor
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($bills_receive as $bill_receive)
                            <tr class="table-custom-tr-price-success">
                                <td>{{ $bill_receive->clearing_date ? $bill_receive->clearing_date->format('d/m/Y') : $bill_receive->due_date->format('d/m/Y') }}</td>
                                <td>{{ $bill_receive->description }}</td>
                                <td>{{ $bill_receive->chartAccount->name }}</td>

                                @if( $bill_receive->situation === "Atrasado")
                                    <td class="text-center"><span class="badge badge-custom-price-danger">{{$bill_receive->situation}}</span></td>
                                    <td class="text-right text-custom-price-danger">{{ $bill_receive->gross_value }}</td>
                                @elseif($bill_receive->situation === "Em aberto")
                                    <td class="text-center"><span class="badge badge-custom-price-info">{{$bill_receive->situation}}</span></td>
                                    <td class="text-right text-custom-price-info">{{ $bill_receive->gross_value }}</td>
                                @else
                                    <td class="text-center"><span class="badge badge-custom-price-success">{{$bill_receive->situation}}</span></td>
                                    <td class="text-right text-custom-price-success">{{ $bill_receive->gross_value }}</td>
                                @endif

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right font-weight-bold">Valor Total: {{ $total_receive }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h2 class="h3 mb-3 text-gray-800"> Pagamentos</h2>
            <div class="table-responsive">
                <table class=" table table-sm table-bordered">
                    <thead>
                    <tr >
                        <th style="width: 15%">
                            Data
                        </th>
                        <th>
                            Descrição do pagamento
                        </th>
                        <th>
                            Plano de contas
                        </th>
                        <th style="width: 15%" class="text-center">
                            Situação
                        </th>
                        <th class="text-right" style="width: 20%">
                            Valor
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills_pay as $bill_pay)
                        <tr class="table-custom-tr-price-danger">
                            <td>{{ $bill_pay->clearing_date ? $bill_pay->clearing_date->format('d/m/Y') : $bill_pay->due_date->format('d/m/Y') }}</td>
                            <td>{{ $bill_pay->description }}</td>
                            <td>{{ $bill_pay->chartAccount->name }}</td>

                            @if( $bill_pay->situation === "Atrasado")
                                <td class="text-center"><span class="badge badge-custom-price-danger">{{$bill_pay->situation}}</span></td>
                                <td class="text-right text-custom-price-danger">{{ $bill_pay->gross_value }}</td>
                            @elseif($bill_pay->situation === "Em aberto")
                                <td class="text-center"><span class="badge badge-custom-price-info">{{$bill_pay->situation}}</span></td>
                                <td class="text-right text-custom-price-info">{{ $bill_pay->gross_value }}</td>
                            @else
                                <td class="text-center"><span class="badge badge-custom-price-success">{{$bill_pay->situation}}</span></td>
                                <td class="text-right text-custom-price-success">-{{ $bill_pay->gross_value }}</td>
                            @endif

                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right font-weight-bold">Valor Total: -{{ $total_pay }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scriptPages')

    <script type="text/javascript">

        $(document).ready(function() {
            $('.activeTabs').removeClass('active');
            $('#balance-tab').addClass('active');
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
