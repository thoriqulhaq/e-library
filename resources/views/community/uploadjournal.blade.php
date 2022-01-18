<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Upload Journal</title>

    
  </head> 
  <body>
    @extends('community.main') 
    @section('title', 'Upload New Journal')
    @section('page')
    
    

    <br>
    <div class="container" style=" height: 100vh; padding:100px" >
    <h1>Upload Your Journal</h1>
      
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

        <form action="{{ url('/uploadjournal') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="tab-content">
            <div class="tab-pane fade show active" id="submit" ><!-- isi upload taruh didalam ini-->
              <div class="row">
                <h>Name of Author<h>
                <input type="text" class="form-control" name="author[]" id="name" required/>
                <h>Title</h>
                <input type="text" class="form-control" name="title"  id="title" required/>
                <h>Genre</h>
                <input type="text" class="form-control" name="genre"  id="genre" />
                <h>Place of Publication</h>
                <input type="text" class="form-control" name="publish-place"  id="date" required/>
                <h>Date of Publication</h>
                <input type="date" class="form-control" name="publish-date"  id="place" required/>
                <h>Volume Number</h>
                <input type="number" class="form-control" name="volume"  id="volume" required/>
                <h>Issue Number</h>
                <input type="number" class="form-control" name="issue"id="issue" required/>
              </div>
              
              <div class="my-4"> <!-- ini margin y atau margin top dan margin bottom -->
                <input class="form-control" type="file" name="journal-file" accept=".pdf" maxlength="1">
                
                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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
              <textarea class="form control" name="description" maxlength="500" placeholder="Description..." id="msg"></textarea>
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
  </body>
  
  
</html>