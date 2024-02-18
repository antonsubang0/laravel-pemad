<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ url('dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('dist/style.css') }}">
</head>

<body>
    <div class="row d-flex mx-0">
        <div class="d-none d-md-block col-8 col-sm-4 col-md-2 col-lg-2 bg-primary min-vh-100 navbar-menu" id="menu0nav">
            <h5 class="text-center text-white mt-3 pb-0 fw-bolder">Admin</h5>
            <h5 class="text-center text-white mb-3 pt-0 fw-bolder">Panel</h5>
            <button type="button" class="d-md-none d-block position-absolute top-0 start-100 btn btn-light" id="close-menu">X</button>
            <div class="divider"></div>
            <div class="row">
                <div class="col">
                    <h6 class="text-white px-3 fw-bold text-decoration-underline">Menu</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="{{Request::route()->getName() == 'home' ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('home') }}" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/klien*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('klien.index') }}">Klien</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/tipepekerjaan*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('tipepekerjaan.index') }}">Tipe Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/pekerjaan*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('pekerjaan.index') }}">Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/proyek*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('proyek.index') }}">Proyek</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/penawaran*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('tawar') }}">Penawaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/permintaan*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('permintaan.index') }}">Permintaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/pembelian*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('pembelian') }}">Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{Request::is('home/tagihan*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('tagihan') }}">Tagihan</a>
                        </li>

                        <li class="nav-item">
                            <a class="{{Request::is('home/perusahaan*') ? 'nav-hover nav-link text-white fw-bold' : 'nav-hover nav-link text-white-50'}}" href="{{ route('perusahaan.index') }}">Perusahaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10 col-lg-10 bg-white px-0">
            <nav class="navbar menu-top-navbar navbar-light bg-primary px-3">
                <div class="container-fluid d-flex justify-content-md-end justify-content-between">
                    <button type="button" class="d-md-none d-block btn btn-light" id="menu-btn">Menu</button>
                    <a type="button" href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
                </div>
            </nav>
            <div class="row mx-0 mt-3">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const btMenu = document.getElementById("menu-btn");
        const closeMenu = document.getElementById("close-menu");
        const navMenu = document.getElementById("menu0nav");
        const listmenu = document.getElementsByClassName("nav-item");
        btMenu.addEventListener('click', () => {
            navMenu.classList.add('custom-men0-dd');
        } );
        closeMenu.addEventListener('click', () => {
            navMenu.classList.remove("custom-men0-dd");
        });
        // for (let index = 0; index < listmenu.length; index++) {
        //     listmenu[index].addEventListener('click', () => {
        //         navMenu.classList.remove("custom-men0-dd");
        //     });
        // };
    </script>
</body>

</html>
