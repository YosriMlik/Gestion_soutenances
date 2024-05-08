<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Nunito+Sans:opsz,wght@6..12,500&family=Open+Sans:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/bootstrap-5.3.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/bootstrap-icons-1.10.5/font/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{ url('/sweetalert/cdn.jsdelivr.net_npm_sweetalert2@11.7.26_dist_sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ url('/virtual-select-master/dist/virtual-select.css') }}">

    <link rel="icon" href="{{ url('/images/IIT2.png') }}">

    <link rel="stylesheet" href="{{ url('/css/style.css') }}">

    <title>@yield('title')</title>

    @yield('style')
</head>
<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="_nav2" href="/specialite/4/soutenances">G.Civil</a>
    <a class="_nav2" href="/specialite/5/soutenances">G.Procédés</a>
    <a class="_nav2" href="/specialite/6/soutenances">G.Telecom</a>
    <a class="_nav2" href="/specialite/7/soutenances">G.indus</a>
    <a class="_nav2" href="/specialite/8/soutenances">G.Info</a>
    <a class="_nav2" href="/specialite/9/soutenances">G.Méca</a>
    <div class="dropdown">
        <a class="_nav2" class="" href="#">Licences</a>
        <div class="dropdown-content">
            <a href="/specialite/1/soutenances">Génie Industriel</a>
            <a href="/specialite/2/soutenances">Informatique</a>
        </div>
    </div>
    <div class="dropdown">
        <a class="_nav2" class="" href="#">Masères</a>
        <div class="dropdown-content">
            <a href="/specialite/3/soutenances">Industrie V4.0</a>
        </div>
    </div>
</div>
<nav class="row g-0 w-100 nave sticky-top shadow-sm">
    <div class="col-auto">
        <a style="display: inline-block;" href="{{ route('logout') }}" class="btn btn-danger rounded-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Déconnexion <i style="display: inline;" class="bi bi-box-arrow-left"></i>
        </a>
        <div class="text-end dropdown" style="display: inline;">
            <a class="btn btn-primary ms-2 px-3" style="border-radius: 0;" href="#Gérer">
                <i class="bi bi-sliders2-vertical"></i>
                <span class="ms-1">Gérer</span>
            </a>
            <div class="dropdown-content" style="left: 0.5rem; ">
                <a class="" href="{{ route('jury.index') }}">Jurys</a>
                <a class="" href="{{ route('invite.index') }}">Invités</a>
                <a class="" href="{{ route('salle.index') }}">Salles</a>
                <a class="" href="{{ route('specialite.index') }}">Spécialités</a>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="col nav-items text-end">
        <div class="dropdown">
            <a class="_link" href="#">Licences</a>
            <div class="dropdown-content">
                <a href="/specialite/1/soutenances">Génie Industriel</a>
                <a href="/specialite/2/soutenances">Informatique</a>
            </div>
        </div>

        <div class="dropdown">
            <a class="_link" href="#">Masères</a>
            <div class="dropdown-content">
                <a href="/specialite/3/soutenances">Industrie V4.0</a>
            </div>
        </div>
            <a class="_link" href="/specialite/4/soutenances">G.Civil</a>
            <a class="_link" href="/specialite/5/soutenances">G.Procédés</a>
            <a class="_link" href="/specialite/6/soutenances">G.Telecom</a>
            <a class="_link" href="/specialite/7/soutenances">G.indus</a>
            <a class="_link" href="/specialite/8/soutenances">G.Info</a>
            <a class="_link" href="/specialite/9/soutenances">G.Méca</a>
    </div>
    <a class="col-auto ms-auto text-end sidebar-icon" onclick="openNav()">&#9776;</a>
</nav>
    <div>
        @yield('content')
    </div>
    <script src="{{ url('/bootstrap-5.3.1-dist/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ url('/sweetalert/cdn.jsdelivr.net_npm_sweetalert2@11.7.26_dist_sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('/virtual-select-master/dist/virtual-select.js') }}"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.body.style.backgroundColor = "#f8f9fa";
        }
        </script>
        @yield('js')
    </body>
    </html>
