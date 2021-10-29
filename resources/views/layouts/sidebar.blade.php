<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestão <sup>1.0</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Painel de Controle</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Menu No Collapse-->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-fw fa-paste"></i>
            <span>Orçamentos / Pedidos</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('client.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Produtos</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('service.index') }}">
            <i class="fas fa-fw fa-tools"></i>
            <span>Serviços</span>
        </a>
    </li>





    <!-- Nav Item - Pages Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        --}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--           aria-expanded="true" aria-controls="collapseTwo">--}}
{{--            <i class="fas fa-fw fa-paste"></i>--}}
{{--            <span><b>Orçamentos / Pedidos</b></span>--}}
{{--        </a>--}}
{{--        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('order.index') }}"><i class="fas fa-fw fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;Gerenciar Orç./Ped.</a>--}}
{{--                <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-cube"></i>&nbsp;&nbsp;&nbsp;Produtos</a>--}}
{{--                <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-tools"></i>&nbsp;&nbsp;&nbsp;Serviços</a>--}}
{{--                <h6 class="collapse-header">Opções auxiliares:</h6>--}}
{{--                <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-list-ol"></i>&nbsp;&nbsp;&nbsp;Situações(status pedido)</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    <!-- Nav Item - Utilities Collapse Menu -->--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-list-alt"></i>--}}
{{--            <span><b>Cadastros</b></span>--}}
{{--            <i class="fas fa-fw fa-users"></i>--}}
{{--            <span><b>Clientes</b></span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('client.index') }}"><i class="fas fa-fw fa-user-friends"></i>&nbsp;&nbsp;&nbsp;Gerenciar clientes</a>--}}
{{--                <a class="collapse-item" href="{{ route('client.index') }}"><i class="fas fa-fw fa-user-friends"></i>&nbsp;&nbsp;&nbsp;Clientes</a>--}}
{{--                <a class="collapse-item" href="utilities-animation.html"><i class="fas fa-fw fa-truck-loading"></i>&nbsp;&nbsp;&nbsp;Fornecedores</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-shopping-basket"></i>--}}
{{--            <span><b>Vendas</b></span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-cube"></i>&nbsp;&nbsp;&nbsp;Produtos</a>--}}
{{--                <a class="collapse-item" href="utilities-animation.html"><i class="fas fa-fw fa-tools"></i>&nbsp;&nbsp;&nbsp;Serviços</a>--}}
{{--                <h6 class="collapse-header">Opções auxiliares:</h6>--}}
{{--                <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-reply-all"></i>&nbsp;&nbsp;&nbsp;Trocas e devoluções</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-cubes"></i>--}}
{{--            <i class="fas fa-barcode"></i>--}}
{{--            <span><b>Produtos</b></span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('product.index') }}"><i class="fas fa-fw fa-cubes"></i>&nbsp;&nbsp;&nbsp;Gerenciar produtos</a>--}}
{{--                <a class="collapse-item" href="utilities-animation.html"><i class="fas fa-fw fa-file-invoice-dollar"></i>&nbsp;&nbsp;&nbsp;Valores de venda</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"--}}
{{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-tools"></i>--}}
{{--            <span><b>Serviços</b></span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="{{ route('service.index') }}"><i class="fas fa-fw fa-screwdriver"></i>&nbsp;&nbsp;&nbsp;Gerenciar serviços</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Financeiro</span>
        </a>
        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bills-pay.index') }}"><i class="fas fa-fw fa-sort-amount-down-alt"></i>&nbsp;&nbsp;&nbsp;Contas a pagar</a>
                <a class="collapse-item" href="{{ route('bills-receive.index') }}"><i class="fas fa-fw fa-sort-amount-up"></i>&nbsp;&nbsp;&nbsp;Contas a receber</a>
                <a class="collapse-item" href="{{ route('balance') }}"><i class="fas fa-fw fa-chart-bar"></i>&nbsp;&nbsp;&nbsp;Fluxo de caixa</a>
                <h6 class="collapse-header">Opções auxiliares:</h6>
                <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-money-bill-alt"></i>&nbsp;&nbsp;&nbsp;Forma de pagamento</a>
                <a class="collapse-item" href="{{ route('chart-account.index') }}"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;&nbsp;Plano de contas</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5"
           aria-expanded="true" aria-controls="collapseUtilities">
{{--            <i class="fas fa-fw fa-clipboard-list"></i>--}}
            <i class="fas fa-fw fa-table"></i>
            <span>Relatórios</span>
        </a>
        <div id="collapseUtilities5" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Relatório financeiro:</h6>
                <a class="collapse-item" href="utilities-color.html">
                    <i class="fas fa-fw fa-clipboard"></i>
                    &nbsp;&nbsp;&nbsp;Relatório diário
                </a>
                <h6 class="collapse-header">Gráfico:</h6>
                <a class="collapse-item" href="utilities-color.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    &nbsp;&nbsp;&nbsp;Gráfico de vendas
                </a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Configurações</span>
        </a>
        <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-cog"></i>&nbsp;&nbsp;&nbsp;Gerais</a>
                <a class="collapse-item" href="{{ route('user.index') }}"><i class="fas fa-fw fa-users"></i>&nbsp;&nbsp;&nbsp;Usuários</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
{{--    <div class="sidebar-card d-none d-lg-flex">--}}
{{--        <img class="sidebar-card-illustration mb-2" src="{{ asset('admin/img/undraw_rocket.svg')}}" alt="...">--}}
{{--        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>--}}
{{--        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>--}}
{{--    </div>--}}

</ul>
