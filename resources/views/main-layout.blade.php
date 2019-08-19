<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hire Your Designer</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3e79d2ba2e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>

    @yield('js_files')

    <!-- Style CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-classes.css') }}" rel="stylesheet">
</head>

<body class="app sidebar-mini">

<!-- Topbar Header -->
<header class="app-header">
    <!-- Logo Name -->
    <a class="app-header__logo" href="{{ url('/') }}">Hire Your Designer</a>
    <!-- Sidebar Toggle Button -->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-stream"></i></a>

    @yield('header_link')

</header>

<!-- Sidebar Navigation -->
<aside class="app-sidebar">
    <ul class="app-menu">
        @yield('sidebar_link')
    </ul>
</aside>

<!-- Main Page -->
<main class="app-content">
    @yield('content')
</main>

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

@yield('footer_scripts')

</body>
</html>