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
    <link href="{{ asset('admin/style.css')}}" rel="stylesheet">
{{--    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}

    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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


    {{-- ------------------- TETE MODAL ----------------- --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modalUserDetail').modal('show');
        });
    </script>



{{-- TESTE ENDERECO DINAMICO--}}

    <script>
        $(document).ready(function(){
            var iAddress=1;
            $("#addRowAddress").click(function(){
                let address = '';
                address += '<div id="addAddress'+(iAddress+1)+'">';
                address += '<hr class="bg-primary">';
                    // address += '<div class="d-flex flex-row-reverse bd-highlight">';
                    //     address += '<button id="removeAddress" type="button" class="btn btn-danger btn-sm bd-highlight" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
                    // address += '</div>';
                    address += '<div class="form-row">';
                        address += '<div class="col-md-2 mb-3">';
                            address += '<label for="customCEP'+iAddress+'">CEP</label>';
                            address += '<input type="text" class="form-control" name="cep'+iAddress+'" id="customCEP'+iAddress+'" placeholder="Ex.: 00000-000">';
                        address += '</div>';

                        address += '<div class="col-md-5 mb-3">';
                            address += '<label for="validationPublicPlace'+iAddress+'">Logradouro</label>';
                            address += '<input type="text" class="form-control" name="public_place'+iAddress+'" id="validationPublicPlace'+iAddress+'" placeholder="Ex.: Rua ...">';
                        address += '</div>';

                        address += '<div class="col-md-5 mb-3">';
                            address += '<label for="validationDistrict'+iAddress+'">Bairro</label>';
                            address += '<input type="text" class="form-control" name="district'+iAddress+'" id="validationDistrict'+iAddress+'" placeholder="Ex.: Bairro ...">';
                        address += '</div>';

                        address += '<div class="col-md-5 mb-3">';
                            address += '<label for="validationCompletemnt'+iAddress+'">Complemento</label>';
                            address += '<input type="text" class="form-control" name="complement'+iAddress+'" id="validationCompletemnt'+iAddress+'" placeholder="Ex.: APTO...">';
                        address += '</div>';

                        address += '<div class="col-md-3 mb-3">';
                            address += '<label for="selectCity'+iAddress+'">Cidade</label>';
                            address += '<select class="form-control" name="city'+iAddress+'" id="selectCity'+iAddress+'">';
                                address += '<option value="-" >-</option>';
                                address += '<option value="MG">Teofilo Otoni</option>';
                            address += '</select>';
                        address += '</div>';

                        address += '<div class="col-md-3 mb-3">';
                            address += '<label for="selectState'+iAddress+'">Estado</label>';
                            address += '<select class="form-control" name="state'+iAddress+'" id="selectState'+iAddress+'">';
                                address += '<option value="-" >-</option>';
                                address += '<option value="Minas Gerais">Minas Gerais</option>';
                            address += '</select>';
                        address += '</div>';
                        address += '<div class="col-md-1 mb-3">';
                            address += '<label for="selectUF'+iAddress+'">UF</label>';
                            address += '<select class="form-control" name="uf'+iAddress+'" id="selectUF'+iAddress+'">';
                                address += '<option value="-" >-</option>';
                                address += '<option value="MG">MG</option>';
                            address += '</select>';
                        address += '</div>';
                    address += '</div>';
                address += '</div>';


                $('#addAddress'+iAddress).append(address);
                iAddress++;
            });
            $("#removeAddress").click(function(){
                if(iAddress>1){
                    $("#addAddress"+(iAddress-1)).html('');
                    iAddress--;
                }
            });

        });



        {{-- TESTE CONTATO DINAMICO--}}

        $(document).ready(function(){
            var iContact=1;
            $("#addRowContact").click(function(){
                let contact = '';
                contact += '<div id="addContact'+(iContact+1)+'">';
                    contact += '<hr class="bg-primary">';
                    // contact += '<div class="d-flex flex-row-reverse bd-highlight">';
                    //     contact += '<button id="removeAddress" type="button" class="btn btn-danger btn-sm bd-highlight" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
                    // contact += '</div>';
                    contact += '<div class="form-row">';
                        contact += '<div class="col-md-2 mb-3">';
                            contact += '<label for="customPhone'+iContact+'">Telefone</label>';
                            contact += '<input type="text" class="form-control" name="phone'+iContact+'" id="customPhone'+iContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        contact += '</div>';

                        contact += '<div class="col-md-2 mb-3">';
                            contact += '<label for="customCellPhone'+iContact+'">Telefone Celular</label>';
                            contact += '<input type="text" class="form-control" name="cell_phone'+iContact+'" id="customCellPhone'+iContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        contact += '</div>';

                        contact += '<div class="col-md-2 mb-3">';
                            contact += '<label for="customWhatsapp'+iContact+'">Whatsapp</label>';
                            contact += '<input type="text" class="form-control" name="whatsapp'+iContact+'" id="customWhatsapp'+iContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        contact += '</div>';

                        contact += '<div class="col-md-3 mb-3">';
                            contact += '<label for="validationCustomEmail'+iContact+'">E-mail</label>';
                            contact += '<input type="email" class="form-control" name="email'+iContact+'" id="validationCustomEmail'+iContact+'" aria-describedby="emailHelp" placeholder="Ex.: email@email.com">';
                            contact += '<div class="invalid-feedback">Por favor, providencie um e-mail valido.</div>';
                        contact += '</div>';

                        contact += '<div class="col-md-3 mb-3" >';
                            contact += '<label for="customNote'+iContact+'">Observação</label>';
                            contact += '<input type="text" class="form-control" name="note'+iContact+'" id="customNote'+iContact+'" placeholder="Ex.: Comercial">';
                        contact += '</div>';
                    contact += '</div>';
                contact += '</div>';


                $('#addContact'+iContact).append(contact);
                iContact++;
            });
            $("#removeContact").click(function(){
                if(iContact>1){
                    $("#addContact"+(iContact-1)).html('');
                    iContact--;
                }
            });

        });


    </script>

</body>

</html>
