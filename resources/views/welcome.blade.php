<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GARMENTOR</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3e79d2ba2e.js"></script>

    <!-- Underscore JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .app-logo {
            font-family: 'Poiret One';
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Catamaran';
            font-weight: 800 !important;
        }

        .btn-xl {
            text-transform: uppercase;
            padding: 1.5rem 3rem;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.1rem;
        }

        .bg-black {
            background-color: #000 !important;
        }

        .rounded-pill {
            border-radius: 5rem;
        }

        .navbar-custom {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .navbar-custom .navbar-brand {
            text-transform: uppercase;
            font-size: 1rem;
            letter-spacing: 0.1rem;
            font-weight: 700;
        }

        .navbar-custom .navbar-nav .nav-item .nav-link {
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.1rem;
        }

        header.masthead {
            position: relative;
            overflow: hidden;
            padding-top: calc(7rem + 72px);
            padding-bottom: 7rem;
            background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: scroll;
            background-size: cover;
        }

        header.masthead .masthead-content {
            z-index: 1;
            position: relative;
        }

        header.masthead .masthead-content .masthead-heading {
            font-size: 4rem;
        }

        header.masthead .masthead-content .masthead-subheading {
            font-size: 2rem;
        }

        header.masthead .bg-circle {
            z-index: 0;
            position: absolute;
            border-radius: 100%;
            background: linear-gradient(0deg, #ee0979 0%, #ff6a00 100%);
        }

        header.masthead .bg-circle-1 {
            height: 90rem;
            width: 90rem;
            bottom: -55rem;
            left: -55rem;
        }

        header.masthead .bg-circle-2 {
            height: 50rem;
            width: 50rem;
            top: -25rem;
            right: -25rem;
        }

        header.masthead .bg-circle-3 {
            height: 20rem;
            width: 20rem;
            bottom: -10rem;
            right: 5%;
        }

        header.masthead .bg-circle-4 {
            height: 30rem;
            width: 30rem;
            top: -5rem;
            right: 35%;
        }

        @media (min-width: 992px) {
            header.masthead {
                padding-top: calc(10rem + 55px);
                padding-bottom: 10rem;
            }
            header.masthead .masthead-content .masthead-heading {
                font-size: 6rem;
            }
            header.masthead .masthead-content .masthead-subheading {
                font-size: 4rem;
            }
        }

        .btn-primary {
            background-color: #ee0979;
            border-color: #ee0979;
        }

        .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
            background-color: #bd0760 !important;
            border-color: #bd0760 !important;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(238, 9, 121, 0.5);
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand app-logo" href="#">GARMENTOR</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up As User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log In As User</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-center text-white">
    <div class="masthead-content">
        <div class="container">
            <h1 class="masthead-heading mb-0 app-logo">
                <span>GARMENTOR</span>
            </h1>
            <h2 class="masthead-subheading mb-0"><span class="app-logo">MENTOR</span> for your <span class="app-logo">GARMENT</span></h2>
            <a href="#step1" class="btn btn-primary btn-xl rounded-pill mt-5">Learn More</a>
        </div>
    </div>
</header>

<section id="step1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="img/01.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">1.Start Order</h2>
                    <p>Create a new order for your next dress/garment by clicking the Start Order button below.</p>
                    <p>Add a small description of what type of dress/garment you are looking for or upload any images that you have to use as a reference.</p>
                    <p>Our designer will reach out to you to collect the required details and give you a price range.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="img/02.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-5">
                    <h2 class="display-4">2.Provide Measurements</h2>
                    <p>Upon the designer's request provide required measurements through this application or by visiting us.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                    <img class="img-fluid rounded-circle" src="img/03.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                    <h2 class="display-4">3.Receive Your Dress</h2>
                    <p>Keep track of your order progress by receiving updates from our designer.</p>
                    <p>Upon completion provide shipping details to receive your garment/dress or collect it from us personally.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-5 bg-black">
    <div class="container">
        <a class="text-white float-right" href="{!! route('contact-us') !!}">Contact Us</a>
    </div>
    <!-- /.container -->
</footer>

</body>

</html>
