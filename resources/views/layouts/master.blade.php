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


{{-- TESTE ENDREDO OUTRIO--}}


    <script>
        $(document).ready(function(){
            var nextAddress = 1;

            $('#addRowAddress').click(function(){
                nextAddress++;

                var newAddress = '<div id="addAddress' + nextAddress + '">';
                    newAddress += '<hr class="bg-primary">';
                    newAddress += '<div class="d-flex flex-row-reverse bd-highlight">';
                        newAddress += '<button  id="'+nextAddress+'" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_address" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
                    newAddress += '</div>';
                    newAddress += '<div class="form-row" >';
                        newAddress += '<div class="col-md-2 mb-3">';
                            newAddress += '<label for="customCEP'+ nextAddress +'">CEP</label>';
                            newAddress += '<input type="text" class="form-control" name="cep'+ nextAddress +'" id="customCEP'+ nextAddress +'" placeholder="Ex.: 00000-000">';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-4 mb-3">';
                            newAddress += '<label for="validationPublicPlace'+ nextAddress +'">Logradouro</label>';
                            newAddress += '<input type="text" class="form-control" name="public_place'+ nextAddress +'" id="validationPublicPlace'+ nextAddress +'" placeholder="Ex.: Rua ...">';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-4 mb-3">';
                            newAddress += '<label for="validationDistrict'+ nextAddress +'">Bairro</label>';
                            newAddress += '<input type="text" class="form-control" name="district'+ nextAddress +'" id="validationDistrict'+ nextAddress +'" placeholder="Ex.: Bairro ...">';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-2 mb-3">';
                            newAddress += '<label for="validationCompletemnt'+ nextAddress +'">Complemento</label>';
                            newAddress += '<input type="text" class="form-control" name="complement'+ nextAddress +'" id="validationCompletemnt'+ nextAddress +'" placeholder="Ex.: APTO...">';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-3 mb-3">';
                            newAddress += '<label for="selectCity'+ nextAddress +'">Cidade</label>';
                            newAddress += '<select class="form-control" name="city'+ nextAddress +'" id="selectCity'+ nextAddress +'">';
                                newAddress += '<option value="-" >-</option>';
                                newAddress += '<option value="MG">Teofilo Otoni</option>';
                            newAddress += '</select>';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-3 mb-3">';
                            newAddress += '<label for="selectState'+ nextAddress +'">Estado</label>';
                            newAddress += '<select class="form-control" name="state'+ nextAddress +'" id="selectState'+ nextAddress +'">';
                                newAddress += '<option value="-" >-</option>';
                                newAddress += '<option value="Minas Gerais">Minas Gerais</option>';
                            newAddress += '</select>';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-2 mb-3">';
                            newAddress += '<label for="selectUF'+ nextAddress +'">UF</label>';
                            newAddress += '<select class="form-control" name="uf'+ nextAddress +'" id="selectUF'+ nextAddress +'">';
                                newAddress += '<option value="-" >-</option>';
                                newAddress += '<option value="MG">MG</option>';
                            newAddress += '</select>';
                        newAddress += '</div>';

                        newAddress += '<div class="col-md-4 mb-3">';
                            newAddress += '<label for="customNoteAddress1">Observação</label>';
                            newAddress += '<input type="text" class="form-control" name="note_address1" id="customNoteAddress1" placeholder="Ex.: Endereço de entrega">';
                        newAddress += '</div>';

                    newAddress += '</div>';
                newAddress += '</div>';


                $('#addAddress1').append(newAddress);
            });
            $(document).on('click', '.btn_remove_address', function(){
                var button_id = $(this).attr("id");
                $('#addAddress'+button_id+'').remove();
            });

        });


        $(document).ready(function(){
            var nextContact = 1;

            $('#addRowContact').click(function(){
                nextContact++;

                var newContact = '<div id="addContact' + nextContact + '">';
                    newContact += '<hr class="bg-primary">';
                    newContact += '<div class="d-flex flex-row-reverse bd-highlight">';
                        newContact += '<button  id="'+nextContact+'" type="button" class="btn btn-danger btn-sm bd-highlight btn_remove_contact" data-toggle="tooltip" data-placement="top" title="Remover"><i class="fas fa-times"></i></button>';
                    newContact += '</div>';
                    newContact += '<div class="form-row">';
                        newContact += '<div class="col-md-4 mb-3">';
                        newContact += '<label for="customPhone'+nextContact+'">Telefone</label>';
                        newContact += '<input type="text" class="form-control" name="phone'+nextContact+'" id="customPhone'+nextContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        newContact += '</div>';

                        newContact += '<div class="col-md-4 mb-3">';
                        newContact += '<label for="customCellPhone'+nextContact+'">Telefone Celular</label>';
                        newContact += '<input type="text" class="form-control" name="cell_phone'+nextContact+'" id="customCellPhone'+nextContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        newContact += '</div>';

                        newContact += '<div class="col-md-4 mb-3">';
                        newContact += '<label for="customWhatsapp'+nextContact+'">Whatsapp</label>';
                        newContact += '<input type="text" class="form-control" name="whatsapp'+nextContact+'" id="customWhatsapp'+nextContact+'" placeholder="Ex.: (00) 0 0000-0000">';
                        newContact += '</div>';

                        newContact += '<div class="col-md-6 mb-3">';
                        newContact += '<label for="validationCustomEmail'+nextContact+'">E-mail</label>';
                        newContact += '<input type="email" class="form-control" name="email'+nextContact+'" id="validationCustomEmail'+nextContact+'" aria-describedby="emailHelp" placeholder="Ex.: email@email.com">';
                        newContact += '<div class="invalid-feedback">Por favor, providencie um e-mail valido.</div>';
                        newContact += '</div>';

                        newContact += '<div class="col-md-6 mb-3" >';
                        newContact += '<label for="customNoteContact'+nextContact+'">Observação</label>';
                        newContact += '<input type="text" class="form-control" name="note_contact'+nextContact+'" id="customNoteContact'+nextContact+'" placeholder="Ex.: Comercial">';
                        newContact += '</div>';
                    newContact += '</div>';

                newContact += '</div>';


                $('#addContact1').append(newContact);
            });
            $(document).on('click', '.btn_remove_contact', function(){
                var button_id = $(this).attr("id");
                $('#addContact'+button_id+'').remove();
            });

        });
    </script>

</body>

</html>
