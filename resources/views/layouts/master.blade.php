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


{{--    --}}{{-- ------------------- TESTE MODAL ----------------- --}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $('#modalUserDetail').modal('show');--}}
{{--        });--}}
{{--    </script>--}}




    <script type="text/javascript">

        let products = {
            'products': []
        };
        function updateValueProduct(index, property, newValue, idLine){

            let subtotalProduct = calcSubtotalProduct(idLine)

            products.products[index][property] = newValue;
            products.products[index]['order_product_subtotal'] = subtotalProduct;

            calcTotalProduct();
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

                    // let randomProduct = Math.floor((Math.random() * 100000000) + 1);
                    let randomProduct = 'product_'+countProduct;

                    let infoProduct = {
                        id_handlebars_product: randomProduct,
                        id_product: idProduct,
                        name_product: nameProduct,
                        quantity_product: 1,
                        meter: '',
                        product_cost_value: productCostValue,
                        sales_value_product_used_order: salesValueProductUsedOrder,
                        discount_product: '',
                        order_product_subtotal: salesValueProductUsedOrder,
                    }

                    products.products.push(infoProduct);
                    product.innerHTML = compiled(products);

                    countProduct+=1;

                   // Removendo item selecionado
                   let removeSelectizeItem = document.getElementById("searchProduct").value;
                   document.getElementById("searchProduct").selectize.removeItem(removeSelectizeItem);

                    calcTotalProduct();
                }

            })

        }


        let services = {
            'services': []
        };
        function updateValueService(index, property, newValue, idLine){

            let subtotalService = calcSubtotalService(idLine)

            services.services[index][property] = newValue;
            services.services[index]['order_service_subtotal'] = subtotalService;

            calcTotalService();
        }

        function addService() {

            let countService = 0;

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

                    // let randomService = Math.floor((Math.random() * 100000000) + 1);
                    let randomService = 'product_'+countService;

                    let infoService = {
                        id_handlebars_service: randomService,
                        id_service: idService,
                        name_service: nameService,
                        value_service: valueService,
                        discount_service: '',
                        order_service_subtotal: valueService,
                    }

                    services.services.push(infoService);
                    service.innerHTML = compiled(services);

                    countService+=1;

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchService").value;
                    document.getElementById("searchService").selectize.removeItem(removeSelectizeItem);

                    calcTotalService();
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

                    let infoAddress = {
                        id_handlebars_address: "addressHandlebars",
                        id_address: idAddress,
                        cep: cepAddress,
                        public_place: publicPlaceAddress,
                        number: numberAddress,
                        district: districtAddress,
                        complement: complementAddress,
                    }

                    service.innerHTML += compiled(infoAddress);

                    // Removendo item selecionado
                    let removeSelectizeItem = document.getElementById("searchAddress").value;
                    document.getElementById("searchAddress").selectize.removeItem(removeSelectizeItem);

                }

            })

        }

        function removeProduct(indexToRemove) {

            products.products.splice(indexToRemove, 1);

            let templateProduct = document.getElementById('tamplateAddProduct').innerHTML;
            let compiled = Handlebars.compile(templateProduct);
            let product = document.getElementById('containerProducts');
            product.innerHTML = compiled(products);


            if(document.getElementsByClassName("existsProduct").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoProductAdded").innerHTML);
                document.getElementById('containerProducts').innerHTML = compiled();
            }

            calcTotalProduct();
        }

        function removeService(indexToRemove) {

            services.services.splice(indexToRemove, 1);

            let templateService = document.getElementById('tamplateAddService').innerHTML;
            let compiled = Handlebars.compile(templateService);
            let service = document.getElementById('containerServices');
            service.innerHTML = compiled(services);

            if(document.getElementsByClassName("existsService").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoServiceAdded").innerHTML);
                document.getElementById('containerServices').innerHTML = compiled();
            }

            calcTotalService();
        }

        function removeAddress(id) {

            document.getElementById(id).remove();

            if(document.getElementsByClassName("existsAddress").length == 0){
                let compiled = Handlebars.compile(document.getElementById("tamplateNoAddressAdded").innerHTML);
                document.getElementById('containerAddresses').innerHTML = compiled();
            }
        }

        addProduct();
        addService();
        addDeliveryAddress();

// ------------------------------------------------------------------------------------------------------------------------------------------------------

        function calcSubtotalProduct(id){
            let quantityProduct = $('#quantityProduct_'+id).val()
            let meter = $('#meter_'+id).val()
            let productOrderValue = $('#salesValueProductUsedOrder_'+id).val()
            let discountProduct = $('#discountProduct_'+id).val()
            let subtotalProduct;

            if(meter){
                subtotalProduct = (quantityProduct *  (Math.ceil(meter * 2) / 2) * productOrderValue) - discountProduct;
            }else{
                subtotalProduct = (quantityProduct * productOrderValue) - discountProduct;
            }

            $('#orderProductSubtotal_'+id).val(subtotalProduct)
            return subtotalProduct;
        }

        function calcTotalProduct(){

            //AQUI FAZER LOOP PARA CONTAR QUANTOS PRODUTOS TEM E SOMAR TODOS OS SUBTOTAIS
            let countProduct = $("input.order_product_subtotal").length;
            let valuesProducts = $("input.order_product_subtotal").map(function(){return $(this).val();}).get();

            let totalProduct = 0;

            if(countProduct > 0){
                for (let i = 0; i < countProduct; i++){
                    totalProduct += parseFloat(valuesProducts[i]);
                }
            }
            $('#total_products').val(totalProduct);
            calcTotal();
        }

        function calcSubtotalService(id){
            let serviceCostValue = $('#serviceCostValue_'+id).val();
            let discountService = $('#discountService_'+id).val();
            let serviceSubtotal;

            serviceSubtotal = serviceCostValue - discountService;

            $('#orderServiceSubtotal_'+id).val(serviceSubtotal)
            return serviceSubtotal;
        }

        function calcTotalService(){

            //AQUI FAZER LOOP PARA CONTAR QUANTOS SERVIÇOS TEM E SOMAR TODOS OS SUBTOTAIS
            let countService = $("input.order_service_subtotal").length;
            let valuesServices = $("input.order_service_subtotal").map(function(){return $(this).val();}).get();

            let totalService = 0;

            if(countService > 0){
                for (let i = 0; i < countService; i++){
                    totalService += parseFloat(valuesServices[i]);
                }
            }
            $('#total_services').val(totalService);
            calcTotal();
        }


       function calcTotal(){

            let totalProducts = parseFloat($('#total_products').val());
            let totalServices = parseFloat($('#total_services').val());

            let totalCashDiscount = parseFloat($("#total_cash_discount").val());
            let totalPercentageDiscount = parseFloat($("#total_percentage_discount").val());

            if(totalCashDiscount && totalPercentageDiscount){
                let percentageDiscount  = (totalProducts+totalServices-totalCashDiscount) * totalPercentageDiscount
                $('#total').val((totalProducts+totalServices-totalCashDiscount) - (percentageDiscount / 100 ));

            }else if(totalCashDiscount){
                $('#total').val(totalProducts+totalServices-totalCashDiscount);

            }else if(totalPercentageDiscount){
                let percentageDiscount  = (totalProducts+totalServices) * totalPercentageDiscount
                $('#total').val((totalProducts+totalServices) - (percentageDiscount / 100 ));
            }else{
                $('#total').val(totalProducts+totalServices);
            }

        }

    </script>

</body>

</html>
