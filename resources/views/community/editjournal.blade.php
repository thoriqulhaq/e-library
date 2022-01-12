@extends('community.main') 
    @section('title', 'Edit Journal')
    @section('page')

<br>
    <div class="container" style=" height: 100vh; padding:100px" >
    <h1>Update Your Journal</h1>
      
      <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <br>
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#submit">Submit</button>
          </li>
          <li class="nav-item" role="presentation">
            <br>
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about" >About</button>
          </li>
        </ul>
        <br>

        <form action="{{ url('/editjournal/' . $id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="tab-content">
            <div class="tab-pane fade show active" id="submit" ><!-- isi upload taruh didalam ini-->
              <div class="row">
                @foreach($authors as $author)
                <h>Name of Author<h>
                <input type="text" class="form-control" name="author[]" id="name" required value="{{$author->name}}"/>
                @endforeach
                <h>Title</h>
                <input type="text" class="form-control" name="title"  id="title" required value="{{$journal->title}}"/>
                <h>Genre</h>
                <input type="text" class="form-control" name="genre"  id="genre" value="{{$journal->genre}}"/>
                <h>Place of Publication</h>
                <input type="text" class="form-control" name="publish-place"  id="date" required value="{{$journal->publication_place}}" />
                <h>Date of Publication</h>
                <input type="date" class="form-control" name="publish-date"  id="place" required value="{{$journal->publication_date}}"/>
                <h>Type Number</h>
                <input type="number" class="form-control" name="type" id="type" value="{{$journal->type}}"/>
                <h>Volume Number</h>
                <input type="number" class="form-control" name="volume"  id="volume" value="{{$journalDetails->volume}}" />
                <h>Issue Number</h>
                <input type="number" class="form-control" name="issue"id="issue" value="{{$journalDetails->issue}}"/>
              </div>
              
              <div class="my-4"> <!-- ini margin y atau margin top dan margin bottom -->
                <input class="form-control" type="file" name="journal-file" accept=".pdf" maxlength="1">
                <br>
              </div>
         
                
              <div class="row">
                <div class="col">
                  <button style="width: 100%;"  type="reset" class="btn btn-outline-primary">Reset</button>
                </div>
                <div class="col">
                  <button style="width: 100%;" type="submit" class="btn btn-primary" href="/">Submit</button>
                </div>
              </div>
            </div>
          <div class="tab-pane fade" id="about"><!-- isi about taruh didalam ini-->
            <div class="row" id="ab1">
            <label class="form-label">Journal Description</label>
              <textarea class="form control" name="description" maxlength="500" placeholder="Description..." value="{{$journal->description}}"></textarea>
              <p>0/500</p>
            </div>
          </div>
        </form>
        @endsection
       
      </div>
      

    </div>
    
    

     


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" class="jsbin"></script>
    <script src="tester.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>