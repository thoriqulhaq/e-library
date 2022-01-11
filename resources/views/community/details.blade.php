@extends('community.main')
@section('title', 'Book')
@section('page')

<!-- Masthead-->
<header class="pt-5 pb-5" style="height: 100vh">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="text-center text-white d-flex justify-content-center" style="padding-top: 180px">
                {{-- @foreach($books as $key => $data) --}}
                <div class="row p-5 pt-5" style="width: 960px !important; margin-top: 30px; margin-bottom:30px; background-color: rgb(213,253,160); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <div class="col col-sm-4">
                        <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/Cover/{{$academicResource->cover_path}}" class="card-img-top" alt="...">
                    </div>
                    <div class="col text-start m-4 " style="color: #212529">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">{{$academicResource->title}}</h3>
                                <p>
                                <b>by 
                                    @foreach ( $academicResourceAuthor as $data )
                                    <span>{{$data->author_name}}</span>
                                    @endforeach
                                </b>
                                </p>
                                <p>
                                    <b>
                                        @foreach ( $academicResourceGenre as $data )
                                        <button type="button" class="btn btn-light" style="border-radius: 25px !important; padding: 4px 12px !important">{{$string = str_replace(' ', '', $data)}}</button>
                                        @endforeach
                                    </b>
                                    </p>
                            </div>
                            <div class="col me-0 text-end">
                                
                                <a href="{{url('/delete-bookmark/' . $academicResource->id)}}" style="color: inherit">
                                    <ion-icon class="p-0 m-0" style="font-size: 25px;" name="{{$bookmarkStatus != 1 ? 'bookmark-outline' : 'bookmark'}}"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <p class="card-text mt-3">{{$academicResource->description}}</p>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary mt-3 ps-4 pe-4" href="{{route('download', ["File_Upload" => $academicResource->file_path])}}" style="background-color: #008000; border: #008000; border-radius: 50px;">Download</a>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</header>

@endsection