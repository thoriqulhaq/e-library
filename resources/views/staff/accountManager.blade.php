@extends('staff.main')
@section('title', 'Admin - IAIN Ponorogo E-Library')
@section('page')

<div class="m-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form method="GET">        
          <input type="text" name="name" placeholder="Name">
          <ion-icon name="search"></ion-icon>  
          <br>
          <label for="mail">Search by email</label>
          <input id="mail" type="checkbox" name="is_email">
        </form>
        <a href="{{route('addAccount')}}" type="button" class="btn d-flex bg-success text-white" data-toggle="tooltip" data-original-title="Delete">
            <p class="my-auto me-3">Add Admin Account</p>
            <ion-icon style="font-size: 24px" name="person-add"></ion-icon>
        </a>
    </div> 

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @php
            $counter = 0;
        @endphp
        @foreach ($datas as $data)
        @php
            $counter++;
        @endphp
          <tr>
            <th scope="row">{{$counter}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->is_admin != true ? 'User' : 'Admin'}}</td>
            <td>
                <a href="{{url('/delete-account/' . $data->id)}}" type="button" class="btn p-0" data-toggle="tooltip" data-original-title="Delete">
                    <ion-icon style="font-size: 16px" name="trash"></ion-icon>
                </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>

@endsection