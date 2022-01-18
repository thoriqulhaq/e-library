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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

    <style>
        body {
        background-color: #eee
    }
    
    .nav-link:hover {
        background-color: #525252 !important
    }
    
    .nav-link .fa {
        transition: all 1s
    }
    
    .nav-link:hover .fa {
        transform: rotate(360deg)
    }
    </style>
    <div class="d-flex">
        <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-success bg-white bg-gradient" style="width: 250px; position: fixed;"> 
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-success text-decoration-none"><img src="{{URL::asset('assets/img/logo.png')}}" alt="iain-ponorogo-library-" height="110" width="230" style="object-fit: cover; margin-left: -15px"></a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                
                <li> <a href="{{url("/admin")}}" style="font-size: 15px;" class="nav-link {{$page == 1 ? 'active bg-success text-white' : 'text-success'}}"> <i class="fa fa-dashboard"></i><span class="ms-2">Dashboard</span> </a> </li>
                
                 <li> <a href="{{url("/content-manager")}}" style="font-size: 15px;" class="nav-link {{$page  == 2 ? 'active bg-success text-white' : 'text-success'}}"> <i class="fa fa-book"></i><span class="ms-2">Content Manager</span> </a> </li>
                 <li> <a href="{{url("/account-manager")}}" style="font-size: 15px;" class="nav-link {{$page  == 3 ? 'active bg-success text-white' : 'text-success'}}"> <i class="fa fa-user"></i><span class="ms-2">Account Manager</span> </a> 
                <li> <a href="{{url("/add-account")}}" style="font-size: 15px;" class="nav-link {{$page  == 4 ? 'active bg-success text-white' : 'text-success'}}"> <ion-icon name="person-add"></ion-icon><span class="ms-2">Add Admin Account</span> </a> </li>
                </li>
                    
                {{-- <li> <a href="#" class="nav-link text-success"> <i class="fa fa-first-order"></i><span class="ms-2">My Orders</span> </a> </li>
                <li> <a href="#" class="nav-link text-success"> <i class="fa fa-cog"></i><span class="ms-2">Settings</span> </a> </li>
                <li> <a href="#" class="nav-link text-success"> <i class="fa fa-bookmark"></i><span class="ms-2">Bookmarks</span> </a> </li> --}}
            </ul>
            <hr>
            <div class="dropdown"> <a href="#" class="d-flex align-items-center text-success text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">  <ion-icon class="me-2" style="font-size: 24px" name="person-circle"></ion-icon> <strong> Admin </strong> </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logouts') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
    
        <div style="width: 100%; margin-left: 250px;">
        @yield('page')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>