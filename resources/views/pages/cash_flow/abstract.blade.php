@extends('pages.cash_flow.cash_flow')

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
                            <td class="text-custom-price-success">{{ $total_pay_x_receive_current }}</td>
                        @else
                            <td class="text-custom-price-danger">{{ $total_pay_x_receive_current }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th class="" scope="row" >Total final previsto:</th>
                        @if($total_pay_x_receive_foreseen > 0)
                            <td class="text-custom-price-success">{{ $total_pay_x_receive_foreseen }}</td>
                        @else
                            <td class="text-custom-price-danger">{{ $total_pay_x_receive_foreseen }}</td>
                        @endif
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
            $('#abstract-tab').addClass('active');
        });

    </script>
@endsection
