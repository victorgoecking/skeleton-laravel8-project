@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-fw fa-sort-amount-up"></i> Adicionar recebimento
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-2 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i> Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bills-receive.index') }}"> Contas a receber</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar recebimento</li>
            </ol>
        </nav>
    </div>

    <form id="formOrder" class="needs-validation" method="POST" action="{{ route('bills-receive.store') }}" novalidate>
        @csrf

        <div class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-fw fa-list-alt"></i> Dados Gerais
            </div>
            <div class="card-body">
                <div class="form-row">

                    <input type="hidden" name="type_movement" value="receber">

                    <div class="col-md-6 mb-3">
                        <label for="customDescription">Descrição *</label>
                        <input type="text" class="form-control" name="description" id="customDescription" placeholder="" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe uma descrição.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="customGrossValue">Valor Bruto *</label>
                        <input type="text" class="form-control" name="gross_value" id="customGrossValue" placeholder="" required>
                        <div class="valid-feedback">
                            Parece bom!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, informe o valor bruto do recebimento.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="selectSettled">Recebimento quitado *</label>
                        <select class="form-control" name="settled" id="selectSettled" required>
                            <option></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
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
                        <input type="date" class="form-control" name="due_date" id="customDueDate" aria-describedby="customDueDateHelp" placeholder="" required>
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


        <div id="cardOccurrence" class="card shadow mb-4">
            <div class="card-header">
                <i class="fas fa-file-invoice-dollar"></i> Formas de pagamento
            </div>
            <div class="card-body">
                <label class="mb-3">Quantas formas de pagamento deseja informar?</label>
                <div class="form-row mb-3">
                    <div class="col-md-3 mb-1">
                        <input type="text" id="quantity_form_payment" name='quantity_form_payment' placeholder='' class="form-control" />
                    </div>
                    <div class="col-md-1 mb-1" style="min-width: 100px">
                        <button class="btn btn-info form-control" type="button" id="btnGenerateFormPayment" aria-hidden="true"><i class="fas fa-sync-alt"></i> Gerar</button>
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
                            <tr id="id_handlebars_form_payment_1" class="existsFormPayment">
                                <td data-name="form_payment">
                                    <select class="form-control" name="form_payment[]" required>
                                        <option></option>
                                        @foreach($form_payments as $form_payment)
                                            <option value="{{$form_payment->id}}">{{$form_payment->description}}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Parece bom!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, selecione a forma de pagamento.
                                    </div>
                                </td>
                                <td data-name="value_form_payment">
                                    <input
                                        type="text"
                                        name='value_form_payment[]'
                                        placeholder=''
                                        class="form-control valueFormPayment"
                                        onkeyup="calcTotalValue()"
                                        onblur="calcTotalValue()"
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
                                    <select class="form-control" name="settled_form_payment[]" required>
                                        <option value="1">Sim</option>
                                        <option value="0" selected>Não</option>
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
                                        placeholder=''
                                        class="form-control"
                                    />
                                </td>
                                <td data-name="del_form_payment">
                                    <button
                                        class='btn btn-danger row-remove'
                                        onclick="removeFormPayment('id_handlebars_form_payment_1')">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
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
                        <textarea class="form-control" name="note" id="exampleFormControlNoteBillsReceive" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-row mt-2">
                    <button class="btn btn-primary" type="submit" aria-hidden="true"><i class="fas fa-paper-plane"></i> Cadastrar</button>
                    <a href="{{ route('bills-receive.index') }}"><button class="btn btn-danger ml-2" type="button" aria-hidden="true"><i class="fas fa-times-circle"></i> Cancelar</button></a>
                </div>
            </div>
        </div>



    </form>

@endsection

@section('scriptPages')

    <script type="x-handlebars-template" id="tamplateAddFormPayment">

            <tr id="@{{id_handlebars_form_payment}}" class="existsFormPayment">
                <td data-name="form_payment">
                    <select class="form-control" name="form_payment[]" required>
                        <option></option>
                        @foreach($form_payments as $form_payment)
                            <option value="{{$form_payment->id}}">{{$form_payment->description}}</option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        Parece bom!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, selecione a forma de pagamento.
                    </div>
                </td>
                <td data-name="value_form_payment">
                    <input
                        type="text"
                        name='value_form_payment[]'
                        placeholder=''
                        class="form-control valueFormPayment"
                        onkeyup="calcTotalValue()"
                        onblur="calcTotalValue()"
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
                    <select class="form-control" name="settled_form_payment[]" required>
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>
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
                        placeholder=''
                        class="form-control"
                    />
                </td>
                <td data-name="del_form_payment">
                    <button
                        class='btn btn-danger row-remove'
                        onclick="removeFormPayment(@{{id_handlebars_form_payment}})">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </td>
            </tr>
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

        function generate(){
            let quantity = document.getElementById("quantity_form_payment").value;

            for (let i = 0; i < quantity; i++){
                add
            }
        }


        function addFormPayment() {

            let botaoAdd = document.getElementById('btnGenerateFormPayment');

            botaoAdd.addEventListener('click', () => {

                let quantity = document.getElementById("quantity_form_payment").value;

                if(quantity >= 1){
                    let templateFormPayment = document.getElementById('tamplateAddFormPayment').innerHTML;
                    let compiled = Handlebars.compile(templateFormPayment);
                    let form_payment = document.getElementById('containerFormPayment');
                    let templateCompiled = '';
                    for (let i = 0; i < quantity; i++){

                        let random_form_payment = Math.floor((Math.random() * 100000000) + 1);
                        let info_form_payment = {
                            id_handlebars_form_payment: random_form_payment,
                        }
                        templateCompiled += compiled(info_form_payment);
                    }
                    form_payment.innerHTML = templateCompiled;
                    calcTotalValue();
                }

            })

        }


        function removeFormPayment(id) {

            if(document.getElementsByClassName("existsFormPayment").length > 1){
                document.getElementById(id).remove();
                calcTotalValue();
            }

        }

        addFormPayment();

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



    </script>
@endsection

