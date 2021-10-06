<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestão - Painel de Controle</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
{{--    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}

    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                {{-- Caso queira usar messagem no corpo do html com div descomentar linha abaixo --}}
                {{-- @include('components.flash-message')--}}

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual. </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    @csrf
                    <a class="btn btn-primary" href="{{ route('logout') }}">Sair</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


    <script src="{{ asset('admin/js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>

    {{--    ADICIONA SCRIPTS DAS PAGINAS--}}
    @yield('scriptPages')

{{-- ------------------- TOASTR NOTIFICATION ----------------- --}}
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if ($message = Session::get('success'))
            toastr["success"]("{{ $message }}","Sucesso!");
        @elseif(($errors->any()))
            @foreach($errors->all() as $error)
                toastr["error"]("{{$error}}","Falhou!");
            @endforeach
        @endif


    </script>


    {{-- ------------------- TESTE MODAL ----------------- --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modalUserDetail').modal('show');
        });
    </script>




    <script type="text/javascript">

        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });


        $(document).ready(function () {

            $(".select_selectize").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),

            });

            $(".select_selectize_client").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),

                onChange:function (value){
                    if(value !== ''){
                        $(".select_selectize_client").removeClass("is-invalid").addClass("is-valid")
                    }else{
                        $(".select_selectize_client").removeClass("is-valid").addClass("is-invalid")
                    }
                },
            });

            $(".select_selectize_address").selectize({
                // create:true, //DAR A OPCAO DE ADICIOANR CASO NAO TIVER
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: $(this).data('placeholder'),
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                allowClear: Boolean($(this).data('allow-clear')),
                onFocus: function () {
                    // control has gained focus
                    let selectClient = $(document.getElementById('validationCustomClient').value);

                    if(selectClient.prevObject === undefined){
                        $('#tooltipSearchAddress').tooltip({
                            'trigger': 'manual',
                            'title': 'Selecione um cliente por favor.',
                            'placement': 'top'
                        }).tooltip('show');
                    }

                },
                onBlur: function () {
                    $('#tooltipSearchAddress').tooltip().tooltip('dispose');
                },

            });
        });

        //RETORNA ENDEREÇOS DO CLIENTE SELECIONADO
        function idClientForAddress(value) {
            $.ajax({
                url: "{{ route('returnClientAddress') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
            },
                success: function (data){

                    let $selectAddress = $(document.getElementById('searchAddress'));
                    let option = $selectAddress[0].selectize;

                    for(let i=0; i <= $selectAddress.length; i++){
                        option.clearOptions(true)
                    }

                    if(!data[0]){
                        $('#tooltipSearchAddress').tooltip({
                            'trigger': 'manual',
                            'title': 'Cliente sem endereços cadastrados.',
                            'placement': 'top'
                        }).tooltip('show');
                    }

                    $.each(data, function (key, val) {

                        let count = option.items.length + 1;

                        if(!val.cep){ val.cep = '-' }
                        if(!val.number){ val.number = '-'}

                        option.addOption({value: val.id+':'+val.cep+':'+val.public_place+':'+val.number+':'+val.district+':'+val.complement, text: 'CEP: '+val.cep+' | '+val.public_place+' | '+val.number});

                        option.addItem(count);

                    });
                },
            })
        }

        function addProduct() {

            let countProduct = 0;

            let botaoAdd = document.getElementById('btnAddProduct');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchProduct").value).split(":");
                let idProduct = myStr[0];
                let nameProduct = myStr[1];
                let productCostValue = myStr[2];
                let salesValueProductUsedOrder = myStr[3];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchProduct").value){
                    if (document.getElementById("noProductAdded")) {
                        document.getElementById("noProductAdded").remove()
                    }

                    let templateProduct = document.getElementById('tamplateAddProduct').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let product = document.getElementById('containerProducts');

                    // let random = Math.floor((Math.random() * 100000000) + 1);
                    let random = 'product_'+countProduct;
                    // let subtotalProduct = calcSubtotalProduct(random);

                    let infoProduct = {
                        id_handlebars_product: random,
                        id_product: idProduct,
                        name_product: nameProduct,
                        quantity_product: 1,
                        product_cost_value: productCostValue,
                        sales_value_product_used_order: salesValueProductUsedOrder,
                        order_product_subtotal: salesValueProductUsedOrder,
                    }

                    //AQUI OLHAR CARREGAMENTO HANDLEBARS
                    product.innerHTML += compiled(infoProduct);
                    countProduct+=1;

                   // Removendo item selecionado
                   let removeSelectizeItem = document.getElementById("searchProduct").value;
                   document.getElementById("searchProduct").selectize.removeItem(removeSelectizeItem);

                }

            })

        }


        let services = {
            'services': []
        };
        function updateValueService(index, property, newValue){
            services.services[index][property] = newValue;
        }

        function addService() {

            let botaoAdd = document.getElementById('btnAddService');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchService").value).split(":");
                let idService = myStr[0];
                let nameService = myStr[1];
                let valueService = myStr[2];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchService").value){
                    if (document.getElementById("noServiceAdded")) {
                        document.getElementById("noServiceAdded").remove()
                    }

                    let templateProduct = document.getElementById('tamplateAddService').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let service = document.getElementById('containerServices');

                    let info = {
                        id_handlebars_service: Math.floor((Math.random() * 100000000) + 1),
                        id_service: idService,
                        quantity_service: 1,
                        name_service: nameService,
                        value_service: valueService
                    }


                    services.services.push(info);

                    service.innerHTML = compiled(services);

                    // console.log(service.innerHTML);

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchService").value;
                    document.getElementById("searchService").selectize.removeItem(removeSelectizeItem);

                }

            })

        }


        function addDeliveryAddress() {

            let botaoAdd = document.getElementById('btnAddAddress');

            botaoAdd.addEventListener('click', () => {

                let myStr = (document.getElementById("searchAddress").value).split(":");
                let idAddress = myStr[0];
                let cepAddress = myStr[1];
                let publicPlaceAddress = myStr[2];
                let numberAddress = myStr[3];
                let districtAddress = myStr[4];
                let complementAddress = myStr[5];

                //verificando se um valor foi adicionado para mandar pro handlesbars
                if(document.getElementById("searchAddress").value){
                    if (document.getElementById("noAddressAdded")) {
                        document.getElementById("noAddressAdded").remove()
                    }else{
                        document.getElementById("addressHandlebars").remove();
                    }


                    let templateProduct = document.getElementById('tamplateAddAddress').innerHTML;
                    let compiled = Handlebars.compile(templateProduct);

                    let service = document.getElementById('containerAddresses');

                    let info = {
                        id_handlebars_address: "addressHandlebars",
                        id_address: idAddress,
                        cep: cepAddress,
                        public_place: publicPlaceAddress,
                        number: numberAddress,
                        district: districtAddress,
                        complement: complementAddress,
                    }

                    service.innerHTML += compiled(info);

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchAddress").value;
                    document.getElementById("searchAddress").selectize.removeItem(removeSelectizeItem);

                }

            })

        }

        function removeDiv(indexToRemove) {

            services.services.splice(indexToRemove, 1);

            let templateProduct = document.getElementById('tamplateAddService').innerHTML;
            let compiled = Handlebars.compile(templateProduct);
            let service = document.getElementById('containerServices');
            service.innerHTML = compiled(services);


            // document.getElementById(id).remove();
            if(document.getElementsByClassName("existsService").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoServiceAdded").innerHTML);
                document.getElementById('containerServices').innerHTML = compiled();
            }

            // if(document.getElementsByClassName("existsProduct").length == 0){
            //     let compiled = Handlebars.compile(document.getElementById("tamplateNoProductAdded").innerHTML);
            //     document.getElementById('containerProducts').innerHTML = compiled();
            // }
            // if(document.getElementsByClassName("existsAddress").length == 0){
            //     let compiled = Handlebars.compile(document.getElementById("tamplateNoAddressAdded").innerHTML);
            //     document.getElementById('containerAddresses').innerHTML = compiled();
            // }

        }

        addProduct();
        addService();
        addDeliveryAddress();


        // function loadSubtotalProduct(){
        //     let botaoAdd = document.getElementById('btnAddProduct');
        //
        //     botaoAdd.addEventListener('click', () => {
        //         let ids_handlebars = []
        //     });
        // }

        function calcSubtotalProduct(id){
            let quantityProduct = $('#quantityProduct_'+id).val()
            let meter = $('#meter_'+id).val()
            let productOrderValue = $('#salesValueProductUsedOrder_'+id).val()
            let discountProduct = $('#discountProduct_'+id).val()
            let subtotalProduct;

            if(meter){
                subtotalProduct = (quantityProduct * meter * productOrderValue) - discountProduct;

            }else{
                subtotalProduct = (quantityProduct * productOrderValue) - discountProduct;
            }

            $('#orderProductSubtotal_'+id).val(subtotalProduct)
            return subtotalProduct;
        }

        function calcTotalProductService(id){



            // let orderProductSubtotal = $("#orderProductSubtotal_"+id).val();
            // let totalProducts = $("#total_products").val();
            // let sumProducts = orderProductSubtotal + totalProducts;
            // $('#total_products').val(sumProducts);
            //
            // let orderServiceSubtotal = $("#orderServiceSubtotal_"+id).val();
            // let totalServices = $("#total_services").val();
            // let sumServices = orderServiceSubtotal + totalServices;
            // $('#total_services').val(sumServices);
            //
            // let totalCashDiscount = $("#total_cash_discount").val();
            // let totalPercentageDiscount = $("#total_percentage_discount").val();
            //
            // let percentageDiscount  = (sumProducts+sumServices-totalCashDiscount) * totalPercentageDiscount
            //
            // $('#total').val((sumProducts+sumServices-totalCashDiscount) - (percentageDiscount / 100 ));


            //AQUI FAZER LOOP PARA CONTAR QUANTOS PRODUTOS TEM E SOMAR TODOS OS SUBTOTAIS

            let orderProductSubtotal = $("#orderProductSubtotal_"+id).val();
            let totalProducts = $("#total_products").val();
            let sumProducts;
            if (totalProducts){
                sumProducts = parseFloat(orderProductSubtotal) + parseFloat(totalProducts);
            }else{
                sumProducts = parseFloat(orderProductSubtotal);
            }
            console.log(sumProducts)
            $('#total_products').val(sumProducts);

        }

       function calcTotal(){
            let totalProducts = $('#total_products').val();
            let totalServices = $('#total_services').val();

            let totalCashDiscount = $("#total_cash_discount").val();
            let totalPercentageDiscount = $("#total_percentage_discount").val();

            if(totalCashDiscount && totalPercentageDiscount){
                let percentageDiscount  = (totalProducts+totalServices-totalCashDiscount) * totalPercentageDiscount
                $('#total').val((totalProducts+totalServices-totalCashDiscount) - (percentageDiscount / 100 ));

            }else if(totalCashDiscount){
                $('#total').val(totalProducts+totalServices-totalCashDiscount);

            }else if(totalPercentageDiscount){
                let percentageDiscount  = (totalProducts+totalServices) * totalPercentageDiscount
                $('#total').val((totalProducts+totalServices) - (percentageDiscount / 100 ));
            }


        }

    </script>

</body>

</html>
