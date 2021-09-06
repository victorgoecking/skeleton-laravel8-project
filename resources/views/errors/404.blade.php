<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestão E.V. - 404</title>

    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/style.css')}}" rel="stylesheet">
    {{--    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        html {
            font-family: system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
            line-height: 1.5;
        }
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        .contentError{
            position: relative;

            --bg-opacity: 1;
            background-color: #F8F9FC;
            background-color: rgba(248,249,252,var(--bg-opacity));

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 1.2rem;


        }

        .font-custom{
            font-size: 1.5rem;
        }

    </style>

</head>

<body>

    <div class="contentError">

        <div class="text-center ">
            <div class="error mx-auto " data-text="404">404</div>
            <p class="lead text-gray-800 font-custom mb-5 ">Página nao encontrada</p>
            <p class="text-gray-600 mb-2">Parece que você encontrou uma falha na matrix...</p>
            <a href="{{ route('dashboard') }}"><b><i class="fas fa-arrow-left"></i> Voltar para o painel de controle</b></a>
        </div>

    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>

    <script src="{{ asset('admin/js/app.js')}}"></script>
</body>

</html>
