@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-sort-amount-down-alt"></i> Edição do pagamento
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bills-pay.index') }}"> Contas a pagar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edição do pagamento</li>
            </ol>
        </nav>
    </div>

    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('bills-pay.update', ['bills_pay' => $bill_pay->id]) }}" onsubmit="checkChartAccounts()" novalidate>
        @csrf
        @method('put')

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <input type="hidden" name="type_movement" value="pagar">

                    <div class="col-md-5 mb-3">
                        <label for="customDescription">Descrição *</label>
                        <input type="text" class="form-control" value="{{$bill_pay->description}}" name="description" id="customDescription" placeholder="" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe uma descrição.
                        </div>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="searchChartAccounts">Plano de contas</label>
                        <select id="searchChartAccounts" name="chart_accounts_id" data-placeholder="Digite para pesquisar..." class="form-control select_selectize_chart_account w-100" data-allow-clear="1" required>
                            <option></option>
                            @foreach($chart_accounts as $chart_account)
                                <option value="{{$chart_account->id}}" {{ $bill_pay->chartAccount->id === $chart_account->id ? 'selected' : '' }}>{{$chart_account->type}} - {{$chart_account->name}}</option>
                            @endforeach
                        </select>
                        <div id="validatyChartAccounts" class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecione o tipo de movimentação.
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="customGrossValue">Valor Bruto *</label>
                        <input type="text" class="form-control" name="gross_value" value="{{$bill_pay->gross_value}}" id="customGrossValue" placeholder="" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o valor bruto do pagamento.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectSettled">Pagamento quitado *</label>
                        <select class="form-control" name="settled" id="selectSettled" required>
                            <option></option>
                            <option value="1" {{$bill_pay->settled == '1' ? 'selected' : ''}}>Sim</option>
                            <option value="0" {{$bill_pay->settled == '0' ? 'selected' : ''}}>Não</option>
                        </select>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecione se quitado.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customDueDate">Data do vencimento *</label>
                        <input type="date" class="form-control" name="due_date" id="customDueDate" value="{{ $bill_pay->due_date->format('Y-m-d') }}" aria-describedby="customDueDateHelp" placeholder="" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe a data do vencimento.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customClearingDate">Data da compensação</label>
                        <input type="date" class="form-control" name="clearing_date" id="customClearingDate" aria-describedby="customClearingDateHelp" placeholder="">
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe a data da compensação.
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-file-invoice-dollar"></i> Formas de pagamento
            </div>
            <div class="card-body">
                <label class="mb-3">Adicionar forma de pagamento</label>
                <div class="form-row mb-3">
                    <div class="col-md-6 col-lg-6">
                        <select id="searchFormPayment" data-placeholder="Digite para pesquisar..." class="form-control select_selectize_form_payment w-100" data-allow-clear="1">
                            <option></option>
                            @foreach($form_payments as $form_payment)
                                <option value="{{$form_payment->id}}:{{$form_payment->description}}">{{$form_payment->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-3 ">
                        <button id="btnAddFormPayment" class="form-control btn btn-primary" type="button"><i class="fas fa-plus-circle"></i> Adicionar</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-sm table-bordered table-hover"  style="width: 100%; min-width: 700px;" id="tab_logic_product">
                            <thead>
                            <tr >
                                <th >
                                    Forma de pagamento. *
                                </th>
                                <th style="width: 20%">
                                    Valor *
                                </th>
                                <th >
                                    Pago *
                                </th>
                                <th style="width: 30%">
                                    Observação
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Del
                                </th>
                            </tr>
                            </thead>
                            <tbody id="containerFormPayment">
                            </tbody>
                            <div id="containerPaymentMovementRemoved"></div>
                        </table>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-12">
                        <h3 id="totalValue" class="text-right"></h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-edit"></i> Observações
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 mb-3">
                        <textarea class="form-control" name="note" id="exampleFormControlNoteBillsPay" rows="5">{{$bill_pay->note}}</textarea>
                    </div>
                </div>

                <div class="form-row mt-2">
                    <button class="btn btn-primary" type="submit" aria-hidden="true"><i class="fas fa-paper-plane"></i> Atualizar</button>
                    <a href="{{ route('bills-pay.index') }}"><button class="btn btn-danger ml-2" type="button" aria-hidden="true"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>



    </form>

@endsection

@section('scriptPages')


    <script type="x-handlebars-template" id="tamplateAddFormPayment">
        @{{#each array_form_payments}}
        <tr id="@{{id_handlebars_form_payment}}" class="existsFormPayment">
            <td data-name="form_payment">
                <input type="hidden" name="form_payment[]" value="@{{id_form_payment}}">
                <input type="hidden" name="id_payment_movement[]" value="@{{id_payment_movement}}">
                <input type="text" name='description_form_payment[]' value="@{{description_form_payment}}" placeholder='' class="form-control" readonly/>
            </td>
            <td data-name="value_form_payment">
                <input
                    type="text"
                    name='value_form_payment[]'
                    value="@{{value_form_payment}}"
                    placeholder=''
                    class="form-control valueFormPayment"
                    onblur="updateValueFormPayment(@{{ @index }}, 'value_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    onkeyup="updateValueFormPayment(@{{ @index }}, 'value_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    required
                />
                <div class="valid-feedback">
                    Parece bom!
                </div>
                <div class="invalid-feedback">
                    Por favor, informe o valor do pagamento.
                </div>
            </td>
            <td data-name="settled_form_payment">
                <select
                    class="form-control"
                    name="settled_form_payment[]"
                    onblur="updateValueFormPayment(@{{ @index }}, 'settled_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    onkeyup="updateValueFormPayment(@{{ @index }}, 'settled_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    required
                >
                    <option></option>
                    <option value='1' {!! `@{{settled_form_payment}}` == '1' ? 'selected' : '' !!}>Sim</option>
                    <option value='0' {!! `@{{settled_form_payment}}` == '0' ? 'selected' : '' !!}>Não</option>
                    {{--                        <option value='1' {!! `@{{settled_form_payment}}` == '1' ? 'selected' : '' !!}>Sim</option>--}}
                    {{--                        <option value='0' {!! `@{{settled_form_payment}}` == '0' ? 'selected' : '' !!}>Não</option>--}}

                </select>
                <div class="valid-feedback">
                    Parece bom!
                </div>
                <div class="invalid-feedback">
                    Por favor, selecione se quitado.
                </div>
            </td>
            <td data-name="note_form_payment">
                <input
                    type="text"
                    name='note_form_payment[]'
                    value="@{{note_form_payment}}"
                    onblur="updateValueFormPayment(@{{ @index }}, 'note_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    onkeyup="updateValueFormPayment(@{{ @index }}, 'note_form_payment', this.value, '@{{id_handlebars_form_payment}}')"
                    placeholder=''
                    class="form-control"
                />
            </td>
            <td data-name="del_form_payment">
                <button
                    class='btn btn-danger row-remove'
                    type="button"
                    onclick="removeFormPayment(@{{  @index }}, @{{id_payment_movement}})">
                    <i class="fas fa-times-circle"></i>
                </button>
            </td>
        </tr>
        @{{/each}}
    </script>

    {{--<script src="{{ asset('admin/js/order.js')}}"></script>--}}
    <script type="text/javascript">

        // ------------------------------------    FORM FORMA PAGAMENTO HIDE CAMPOS
        $(document).ready(function(){
            //executar quando a página é carregada
            esconde();

            //executar todas as vezes que houver alterações do select;
            $('#selectSettled').change(function(){
                esconde();
            });


        });

        function esconde(){
            //quando tiver editando o formuláro o valor fica no Select
            selectedValue = $('#selectSettled').val();

            //quando tiver visualizando o formulário o valor fica no campo text;
            if(!selectedValue){
                selectedValue = $('#selectSettled').text();
            }
            switch(selectedValue) {
                case "0":
                    $('#customClearingDate').prop('disabled', true);
                    $('#customClearingDate').prop('required', false);
                    $("#customClearingDate").val("");

                    break;
                case "1":
                    $('#customClearingDate').prop('disabled', false);
                    $('#customClearingDate').prop('required', true);
                    $('#customClearingDate').val('{{date('Y-m-d', time()) }}');

                    break;
                default:

                    $('#customClearingDate').prop('disabled', true);
                    $('#customClearingDate').prop('required', false);
                    $("#customClearingDate").val("");

            }
        }


        //DESABILITA ENVIO POR ENTER
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
        $(document).ready(function() {
            $(".select_selectize_form_payment").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),
            });

            $(".select_selectize_chart_account").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),

                onChange:function (value){
                    if(value){
                        document.getElementById('validatyChartAccounts').style.display= 'block'
                        $(".select_selectize_chart_account").removeClass("is-invalid").addClass("is-valid")
                    }else{
                        document.getElementById('validatyChartAccounts').style.display= 'none'
                        $(".select_selectize_chart_account").removeClass("is-valid").addClass("is-invalid")
                    }
                },

            });
        });

        function checkChartAccounts(){

            document.getElementById('validatyChartAccounts').style.display= 'none'

            let removeSelectizeItem = document.getElementById("searchChartAccounts").value;

            if (removeSelectizeItem){
                $(".select_selectize_chart_account").removeClass("is-invalid").addClass("is-valid")
            }else{
                $(".select_selectize_chart_account").removeClass("is-valid").addClass("is-invalid")
            }
        }



        let countFormPayment = 0;

        let array_form_payments = {
            'array_form_payments': []
        };

        function loadFormPayments(idPaymentMovement, idFormPayment, descriptionFormPayment, value, paid, note){
            let templateFormPayment = document.getElementById('tamplateAddFormPayment').innerHTML;
            let compiled = Handlebars.compile(templateFormPayment);
            let form_payment = document.getElementById('containerFormPayment');

            let randomFormPayment = 'formPayment_'+countFormPayment;

            let info_form_payment = {
                id_handlebars_form_payment: randomFormPayment,
                id_payment_movement: idPaymentMovement,
                id_form_payment: idFormPayment,
                description_form_payment: descriptionFormPayment,
                value_form_payment: value,
                settled_form_payment: paid,
                note_form_payment: note,
            }

            array_form_payments.array_form_payments.push(info_form_payment);
            form_payment.innerHTML = compiled(array_form_payments);

            countFormPayment += 1;

            calcTotalValue();
        }

        function updateValueFormPayment(index, property, newValue, idLine){

            array_form_payments.array_form_payments[index][property] = newValue;


            calcTotalValue();
        }

        function addFormPayment() {

            let botaoAdd = document.getElementById('btnAddFormPayment');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchFormPayment").value).split(":");
                let idFormPayment = myStr[0];
                let descriptionFormPayment = myStr[1];

                if(document.getElementById("searchFormPayment").value){
                    let templateFormPayment = document.getElementById('tamplateAddFormPayment').innerHTML;
                    let compiled = Handlebars.compile(templateFormPayment);
                    let form_payment = document.getElementById('containerFormPayment');

                    let randomFormPayment = 'formPayment_'+countFormPayment;

                    let info_form_payment = {
                        id_handlebars_form_payment: randomFormPayment,
                        id_form_payment: idFormPayment,
                        description_form_payment: descriptionFormPayment,
                        value_form_payment: '',
                        settled_form_payment: '',
                        note_form_payment: '',
                    }


                    array_form_payments.array_form_payments.push(info_form_payment);
                    form_payment.innerHTML = compiled(array_form_payments);

                    countFormPayment += 1;

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchFormPayment").value;
                    document.getElementById("searchFormPayment").selectize.removeItem(removeSelectizeItem);

                    // calcTotalValue();
                }

            })

        }


        function removeFormPayment(indexToRemove, idPaymentMovement) {

            if(idPaymentMovement){
                $('#containerPaymentMovementRemoved').append("<input type='hidden' name='id_payment_movement_removed[]' value='"+idPaymentMovement+"'>")
            }

            // if(document.getElementsByClassName("existsFormPayment").length > 1){
            array_form_payments.array_form_payments.splice(indexToRemove, 1);

            let templateFormPayment = document.getElementById('tamplateAddFormPayment').innerHTML;
            let compiled = Handlebars.compile(templateFormPayment);
            let form_payment = document.getElementById('containerFormPayment');
            form_payment.innerHTML = compiled(array_form_payments);

            calcTotalValue();
            // }

        }

        addFormPayment();

        @if($form_payment_cash_movements)
            @foreach($form_payment_cash_movements as $form_payment_cash_movement)
                loadFormPayments(
                    "{{$form_payment_cash_movement->id}}",
                    "{{$form_payment_cash_movement->formPayments->id}}",
                    "{{$form_payment_cash_movement->formPayments->description}}",
                    "{{$form_payment_cash_movement->value}}",
                    "{{$form_payment_cash_movement->paid}}",
                    "{{$form_payment_cash_movement->note}}",
                );
            @endforeach
        @endif

        function calcTotalValue(){

            let sum = 0;

            $(".valueFormPayment").each(function () {
                let val = $.trim( $(this).val() );

                if(val) {
                    val = parseFloat(val);

                    sum += !isNaN(val) ? val : 0
                }
            });

            $("#totalValue").html('Valor total: R$ ' + sum);
        }

        calcTotalValue();



    </script>
@endsection

