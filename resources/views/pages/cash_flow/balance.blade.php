@extends('pages.cash_flow.cash_flow')

@section('content-cash-flow')

    <div>
        <table class=" table table-bordered">

            <tbody>
            <tr>
                <th class="" scope="row" >Nº do pedido</th>
                <td class="" colspan="1"></td>
            </tr>
            <tr>
                <th class="" scope="row" >SALDO</th>
                <td class="" colspan="1"></td>
            </tr>
            <tr>
                <th class="" scope="row" >Situação</th>

                <td class="" colspan="1"><span class="badge badge-danger"></span></td>

            </tr>
            <tr>
                <th class="" scope="row" >Valor</th>
                <td class="" colspan="1"></td>
            </tr>
            <tr>
                <th class="" scope="row" >Data do vencimento</th>
                <td class="" colspan="1"></td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection

@section('scriptPages')

    <script type="text/javascript">

        $(document).ready(function() {
            $('.activeTabs').removeClass('active');
            $('#balance-tab').addClass('active');
        });

    </script>
@endsection
