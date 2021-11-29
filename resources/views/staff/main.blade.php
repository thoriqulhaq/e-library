<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="https://iainponorogo.ac.id/wp-content/uploads/2017/08/IAIN.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-light bg-white static-top m-4 fixed-top" style="border-radius: 50px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
    -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
    -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
        <div class="container-fluid ps-4 pe-4">
            <a class="navbar-brand p-0" href="/">
                <img src="{{URL::asset('assets/img/logo.png')}}" alt="iain-ponorogo-library-" height="70" width="190" style="object-fit: cover;">
            </a>
            <div>
                <a class="btn btn-primary ps-4 pe-4 me-2" href="#signup" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Login</a>
                <a class="btn btn-primary ps-4 pe-4" href="#signup" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Sign Up</a>
            </div>
        </div>
    </nav>

    @yield('page')

    <footer class="footer" style="background-color: rgb(213,253,160)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!" class="text-decoration-none text-reset">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; IAIN Ponorogo E-Library 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3" style="color: #008000;"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3" style="color: #008000;"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3" style="color: #008000;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>