@extends('community.main')
@section('title', 'IAIN Ponorogo E-Library')
@section('page')

<!-- Masthead-->
<header class="masthead" style="height: 100vh">
    <div class="container position-relative" style="padding: 50px 0">
        <div class="row justify-content-center">
            <div class="">
                <div class="text-center text-white">
                    <div class="row">
                        <div class="col">
                            <img src="{{URL::asset('assets/img/pic1.svg')}}" alt="iain-ponorogo-library-" height="500" width="500">
                        </div>
                        <div class="col pe-5 ps-4" style="padding: 120px 0">
                            <h1 class="mb-5" style="color: white">Discover, Enlighten, Inspire</h1>
                   
                            <form action="{{ url('/') }}" method="GET" >
                                <div class="row" style="--bs-gutter-x: 0 !important;">
                                    <div class="col">
                                        <input class="form-control form-control-lg" style="border-radius: 50px 0 0 50px; padding-left: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                        -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                        -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8); font-size: 15px;"  type="text" name="title" placeholder="Search Academic Papers, Books, Journals etc" />
                                    </div>
                                    <div class="col-auto"><button class="btn btn-primary btn-lg ps-4" type="submit" style="background-color: #108B4E; border:#108B4E; border-radius: 0 50px 50px 0; height: 56.5px; padding-right: 35px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                        -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                                        -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8); font-size: 15px;">Search</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Page heading-->
                    

                    
                </div>
            </div>
        </div>
    </div>
</header><br>
@if($pageStatus == 'Search')
<table class="table container mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(103,103,103); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);" id="table">
                                <thead>
                                    <tr>
                                        <th style="color: white !important" >Title</th>
                                        <th style="color: white !important" >Description</th>
                                        <th style="color: white !important" >Genre</th>
                                        <th style="color: white !important" >Publishing Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($results) != 0)
                                    @foreach ($results as $res)
                                    <tr>
                                        
                                        <td style="color: white !important border-bottom:none !important" ><a href="{{ url('/book/' . $res->id) }}">{{ $res->title }}</a></td>
                                        <td style="color: white !important border-bottom:none !important" ><a href="{{ url('/book/' . $res->id) }}">
                                            @if ($res->description == null)
                                            <p>No Description</p>
                                            @else
                                            {{ $res->description }}</a>
                                        </td>@endif
                                        <td style="color: white !important border-bottom:none !important" ><a href="{{ url('/book/' . $res->id) }}">{{$res->genre}}</td>
                                        <td style="color: white !important border-bottom:none !important" ><a href="{{ url('/book/' . $res->id) }}">{{$res->publication_date}}</td>
                                    
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>      
                                        <td style="color: white !important; border-bottom:none !important" colspan="4" class="text-center">Not Found</td>                                
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            @endif
<!-- Icons Grid-->
<section class="features-icons text-center" style="background-color: white; height: 100vh">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(103,103,103); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <div class="row mb-4">
                        <h4 style="color: white !important" >NEW RELEASES</h4>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        
                        @foreach ( $academicResource as $data )
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/{{$data->cover_path}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{url('/book/' . $data->id)}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title" style="color: white !important">{{$data->title}}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3 p-5" style="background-color: rgb(103,103,103); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <div class="row mb-4">
                        <h4 style="color: white !important">MOST DOWNLOAD</h4>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ( $academicResourceSortByDownload as $data )
                        <div class="card m-2 bg-light" style="width: 15rem;">
                            <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/{{$data->cover_path}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="{{url('/book/' . $data->id)}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title" style="color: white !important">{{$data->title}}</h5>
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