<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hire Your Designer</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Font-icon css -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">

<!-- Topbar Header -->
<header class="app-header">
    <!-- Logo Name -->
    <a class="app-header__logo" href="{{ url('/') }}">
        Hire Your Designer
    </a>
    <!-- Sidebar Toggle Button -->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Topbar -->
    <ul class="app-nav">
        <!-- Logout Button -->
        <li>
            <a class="app-nav__item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-lg"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</header>

<!-- Sidebar Navigation -->
<aside class="app-sidebar">
    <ul class="app-menu">
        <!-- Dashboard -->
        <li>
            <a class="app-menu__item active" href="{{ url('/') }}">
                <i class="fa fa-dashboard"></i>
                <span class="app-menu__label">
                      Dashboard
                </span>
            </a>
        </li>
        <!-- Pages -->
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="fa fa-file-text"></i>
                <span class="app-menu__label">
                      Pages
                  </span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="#">
                        <i class="icon fa fa-circle-o"></i> Login Page
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

<!-- Main Page -->
<main class="app-content">
    @yield('content')
</main>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function($)
    {
        // Toggle Sidebar
        $('[data-toggle="sidebar"]').click(function(event)
        {
            event.preventDefault();
            $('.app').toggleClass('sidenav-toggled');
        });

        // Activate sidebar treeview toggle
        $("[data-toggle='treeview']").click(function(event)
        {
            event.preventDefault();

            if(!$(this).parent().hasClass('is-expanded'))
            {
                $('.app-menu').find("[data-toggle='treeview']").parent().removeClass('is-expanded');
            }

            $(this).parent().toggleClass('is-expanded');
        });

        // Set initial active toggle
        $("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

        //Activate bootstrip tooltips
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
</body>
</html>