@extends('community.main')
@section('title', 'Book 1')
@section('page')

<!-- Masthead-->
<header class="masthead pt-5 pb-5">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="text-center text-white d-flex justify-content-center">
                @foreach($books as $key => $data)
                <div class="row p-5 bg-light rounded" style="width: 960px !important; margin-top: 30px; margin-bottom:30px;">
                    <div class="col col-sm-4">
                        <img src="https://covers.zlibcdn2.com/covers299/books/83/8c/c6/838cc6ac8cb0d8ddb98fdb1ae0c8a443.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="col text-start m-4 " style="color: #212529">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">{{$data->title}}</h3>
                            </div>
                            <div class="col me-0 text-end">
                                <ion-icon class="p-0 m-0" style="font-size: 25px;" name="bookmark-outline"></ion-icon>
                            </div>
                        </div>
                        <p class="card-text mt-3">{{$data->description}}</p>
                        <a class="btn btn-primary mt-5" href="{{route('download', ["File_Upload" => "1637349857AA MidTerm Template.pdf"])}}" style="background-color: #008000; border: #008000">Download</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</header>

@endsection