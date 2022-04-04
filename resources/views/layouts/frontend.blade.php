<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description" content="Captain Foodies">
    <meta name="author" content="Sahabat Pintar">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="Captain Foodies" /> <!-- website name -->
    <meta property="og:site" content="{{ url('/') }}" /> <!-- website link -->
    <meta property="og:title" content="Captain Foodies" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Captain Foodies" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="{{ asset('frontend/img/logo.png') }}" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="{{ url('/') }}" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!--title-->
    <title>Captain Foodies</title>

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('frontend/img/logo.png') }}" type="image/png" sizes="16x16">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&display=swap"
        rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    @stack('add-css')
</head>

<body>

    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo.png') }}"
                        width="200" alt="logo" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>

                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        {{--
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#home">Home</a>
                        </li>
                        --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!--end navbar-->
    </header>
    <!--header section end-->

    @yield('content')

    <!--footer section start-->
    <footer class="footer-section">

        <!--footer copyright start-->
        <div class="footer-bottom gray-light-bg pt-4 pb-4">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <p class="copyright-text pb-0 mb-0">Copyrights © {{ date('Y') }} All
                            rights reserved by
                            <a href="www.sahabatpintar.com">sahabatpintar.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--footer copyright end-->
    </footer>
    <!--footer section end-->


    <!--jQuery-->
    <script src="{{ asset('frontend/js/jquery-3.5.0.min.js') }}"></script>
    <!--Popper js-->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!--Bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!--Magnific popup js-->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!--jquery easing js-->
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <!--jquery ytplayer js-->
    <script src="{{ asset('frontend/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!--owl carousel js-->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!--countdown js-->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <!--validator js-->
    <script src="{{ asset('frontend/js/validator.min.js') }}"></script>
    <!--custom js-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    @stack('add-script')
</body>

</html>