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
                   
                    <form action="{{ url('/') }}" method="GET" >
                        <div class="row" style="--bs-gutter-x: 0 !important;">
                            <div class="col">
                                <input class="form-control form-control-lg" style="border-radius: 50px 0 0 50px; padding-left: 35px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);"  type="text" name="title" placeholder="Search Academic Papers, Books, Journals etc" />
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled ps-4" type="submit" style="background-color: #008000; border:#008000; border-radius: 0 50px 50px 0; height: 64px; padding-right: 35px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">Search</button></div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</header><br>
<table class="table container mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(213,253,160); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);" id="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Genre</th>
                                        <th>Publishing Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $res)
                                    <tr>
                                        
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{ $res->title }}</a></td>
                                        <td><a href="{{ url('/book/' . $res->id) }}">
                                            @if ($res->description == null)
                                            <p>No Description</p>
                                            @else
                                            {{ $res->description }}</a>
                                        </td>@endif
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{$res->genre}}</td>
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{$res->publication_date}}</td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        @foreach ( $academicResource as $data )
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/{{$data->cover_path}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{url('/book/' . $data->id)}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$data->title}}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
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
                        @foreach ( $academicResourceSortByDownload as $data )
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/{{$data->cover_path}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{url('/book/' . $data->id)}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">{{$data->title}}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection