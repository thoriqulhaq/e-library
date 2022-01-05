@extends('staff.main')
@section('title', 'Admin - IAIN Ponorogo E-Library')
@section('page')

<div class="m-5">
    <div class="d-flex justify-content-end mb-4">
        <a href="{{route('addAccount')}}" type="button" class="btn d-flex bg-success text-white" data-toggle="tooltip" data-original-title="Delete">
            <p class="my-auto me-3">Add Admin Account</p>
            <ion-icon style="font-size: 24px" name="person-add"></ion-icon>
        </a>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
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
            <td> <img src="{{$academicResource->cover_path ?? ""}}" class="card-img-top" alt="cover"></td>
            <td>{{$academicResource->title}}</td>
            <td>
                
<button type="button" class="btn btn-light" style="border-radius: 25px !important; padding: 4px 12px !important">{{$string = str_replace(' ', '', $academicResource->genre)}}</button>
                                  
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>

@endsection