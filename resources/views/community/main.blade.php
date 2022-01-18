<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-white static-top m-4 fixed-top" style="border-radius: 50px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
    -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
    -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
        <div class="container-fluid ps-3 pe-3">
            <a class="navbar-brand p-0" href="/">
                <img src="{{URL::asset('assets/img/logo.png')}}" alt="iain-ponorogo-library-" height="60" width="180" style="object-fit: cover;">
            </a>
            <div>
                @if (Auth::check())
                   <div class="dropdown">
                        <a class="text text-dark text-decoration-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- {{dd(Auth::user())}} --}}
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profile</a></li>
                            @if(Auth::user()->is_admin == true)
                                <li><a class="dropdown-item" href="{{ url('/admin') }}">Admin Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ url('/bookmarks') }}">Bookmarks</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                            <li><button type="submit" class="dropdown-item">Logout</button></li>
                            </form>
                        </ul>
                    </div>
                @else
                <a class="btn btn-primary ps-4 pe-4 me-2" href="{{url("/login")}}" style="background-color: #108B4E; border-radius: 50px; border: #108B4E 1px solid; font-size: 15px; width: 110px">Login</a>
                <a class="btn btn-primary ps-4 pe-4" href="{{url("/register")}}" style="background-color: #108B4E; border-radius: 50px; border: #108B4E 1px solid; font-size: 15px; width: 110px">Sign Up</a>
                @endif
            </div>
        </div>
    </nav>

    @yield('page')

    <footer class="footer" style="background-color: rgb(103,103,103)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto" style="color: white !important">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset text-white">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset text-white">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset text-white">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset text-white">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0 text-white" style="color: white !important">&copy; IAIN Ponorogo E-Library 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3" style="color: white;"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3" style="color: white;"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3" style="color: white;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>