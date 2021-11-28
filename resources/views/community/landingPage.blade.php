@extends('community.main')
@section('title', 'IAIN Ponorogo E-Library')
@section('page')

<!-- Masthead-->
<header class="masthead" style="height: 100vh">
    <div class="container position-relative mt-5" style="padding: 120px 0">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="mb-5" style="color: #212529">Discover, Enlighten, Inspire</h1>
                    <!-- Signup form-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row" style="--bs-gutter-x: 0 !important;">
                            <div class="col">
                                <input class="form-control form-control-lg" style="border-radius: 50px 0 0 50px; padding-left: 35px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);" id="emailAddress" type="text" placeholder="Search Academic Papers, Books, Journals etc" />
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled ps-4" id="submitButton" type="submit" style="background-color: #008000; border:#008000; border-radius: 0 50px 50px 0; height: 64px; padding-right: 35px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">Search</button></div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                <p>To activate this form, sign up at</p>
                                <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Icons Grid-->
<section class="features-icons text-center" style="background-color: white; height: 100vh">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(213,253,160); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <div class="row mb-4">
                        <h4>NEW RELEASES</h4>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                            </div>
                        </div>
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(213,253,160); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <div class="row mb-4">
                        <h4>MOST DOWNLOAD</h4>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                            </div>
                        </div>
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection