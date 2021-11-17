@extends('community.main')
@section('title', 'IAIN Ponorogo E-Library')
@section('page')

<!-- Masthead-->
<header class="masthead">
    <div class="container position-relative">
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
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddress" type="text" placeholder="Search Academic Papers, Books, Journals etc" />
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit" style="background-color: #008000; border:#008000">Search</button></div>
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
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 bg-white p-5 rounded">
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
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 bg-white p-5 rounded">
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
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{ route('detail') }}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Clean Code</h5>
                                </a>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection