<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>@yield("title")</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--
    Ramayana CSS Template
    https://templatemo.com/tm-529-ramayana
    -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-style.css">
    <link rel="stylesheet" href="/assets/css/owl.css">

</head>

<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <div class="logo">
                    <a href="#">darkMail</a>
                </div>
            </header>

            <!-- Banner -->
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </section>
        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">

        <div class="inner">

            <!-- Search Box -->
            <section id="search" class="alt">
                <form method="get" action="#">
                    <input type="text" name="search" id="search" placeholder="Search..."/>
                </form>
            </section>

            <!-- Menu -->
            <nav id="menu">
                <ul>
                    @if (Auth::user())
                        <li><a href="/emails/create">Compose new mail</a></li>
                    @else
                        <li><a href="/">Homepage</a></li>
                    @endif
                    @if (!Auth::user())
                        <li><a href={{route("login")}}>login</a></li>
                    @else
                        <li><a href="/users/info">personal data</a></li>
                    @endif
                    <li><a href="{{route("register")}}">register</a></li>
                    @if (Auth::user())
                        <li>
                            <span class="opener">Emails</span>
                            <ul>
                                <li><a href="/emails/sentBox">sent box</a></li>
                                <li><a href="/emails/inbox">inbox</a></li>
                                <li><a href="/emails/starBox">starred</a></li>
                                <li><a href="/emails/deletedBox">deleted</a></li>
                            </ul>
                        </li>
                        <form method="post" action="{{route("logout")}}">
                            @csrf
                            <button class="btn btn-secondary" type="submit">log out</button>
                        </form>
                    @endif
                </ul>
            </nav>

            <!-- Featured Posts -->


            <!-- Footer -->
            <footer id="footer">
                <p class="copyright">Copyright {{date("Y")}} DarkMail</p>
            </footer>

        </div>
    </div>

</div>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/browser.min.js"></script>
<script src="/assets/js/breakpoints.min.js"></script>
<script src="/assets/js/transition.js"></script>
<script src="/assets/js/owl-carousel.js"></script>
<script src="/assets/js/custom.js"></script>
</body>
</html>
