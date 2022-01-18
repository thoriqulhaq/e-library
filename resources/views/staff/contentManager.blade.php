@extends('staff.main')
@section('title', 'Admin - IAIN Ponorogo E-Library')
@section('page')

<div class="m-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form method="GET">   
            <label class="form-label">Search</label>
            <br>
            <input type="text" name="title" placeholder="Title">
            <input type="text" name="author" placeholder="Author"> 
            <input type="submit" value="Search">
        </form>
        <a href="{{url('/uploadbook')}}" type="button" class="btn d-flex bg-success text-white" data-toggle="tooltip" data-original-title="Delete">
            <p class="my-auto me-3">Add Academic Resource</p>
            <ion-icon style="font-size: 24px" name="book"></ion-icon>
        </a>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($datas as $academicResource)
        @php
            $counter++;
        @endphp
          <tr>
            <th scope="row">{{$counter}}</th>
            <td> <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/Cover/{{$academicResource->cover_path}}" class="card-img-top "  style="width:160px; height:200px;"></td>
            <td><a class="text-decoration-none "href="{{url('/book/' . $academicResource->id)}}">{{$academicResource->title}}</a></td>
            <td>
                @foreach (explode(',', $academicResource->genre) as $genre) 
<button type="button" class="btn btn-light" style="border-radius: 25px !important; padding: 4px 12px !important">{{$string = str_replace(' ', '', $genre)}}</button>
                @endforeach                
            </td>
           <td>
                <a href="{{url('/editbook/' . $academicResource->id)}}" type="button" class="btn p-0" data-toggle="tooltip" data-original-title="Delete">
                    <ion-icon style="font-size: 16px" name="create-outline"></ion-icon>
                </a>
            </td> 
            <td>
                <a href="{{url('/delete-content/' . $academicResource->id)}}" type="button" class="btn p-0" data-toggle="tooltip" data-original-title="Delete">
                    <ion-icon style="font-size: 16px" name="trash"></ion-icon>
                </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>


@endsection