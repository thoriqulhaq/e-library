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

  <div class="modal fade" id="testModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <i class="modal-title material-icons" style="font-size: 30px; color: blue;">info</i>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div> 
    </div>
    @extends('community.main') 
    @section('title', 'Upload New Journal')
    @section('page')

   <!-- <script>
      $(document).ready(function () {

        $("form").submit(function (event) {
          event.preventDefault();
          
          // Check for volume
          let volume = $("input[name='volume']");
          if (isNaN(volume.val())) {
            volume[0].setCustomValidity("This field must be a number");
            volume[0].reportValidity();
            volume[0].setCustomValidity("");
            return;
          }

          // Check for issue
          let issue = $("input[name='issue']");
          if (isNaN(issue.val())) {
            issue[0].setCustomValidity("This field must be a number");
            issue[0].reportValidity();
            issue[0].setCustomValidity("");
            return;
          }
          

          $("button[type='submit']").attr("disabled", true);
          $("progress").removeAttr("hidden");

          $.ajax({
            xhr: function () {
              let xhr = new XMLHttpRequest();
              xhr.upload.addEventListener("progress", function (ev) {
                $("progress").val(ev.loaded / ev.total);
              });

              return xhr;
            },
            url: "{{ url('/uploadjournal') }}",
            method: "POST",
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
            contentType: false,
            data: new FormData($("form")[0]),
            processData: false,

            error: function (xhr, status, err) {
              $(".modal-body").html("Fail to upload journal: " + xhr.responseText);

              (new bootstrap.Modal(document.getElementById("testModal"), { })).show();
              $("button[type='submit']").removeAttr("disabled");
            },

            success: function (response, status, xhr) {
              if (xhr.status == 201) {
                window.location.href = xhr.getResponseHeader("Location");
              }
              else {
                $(".modal-body").html(xhr.responseText);

                (new bootstrap.Modal(document.getElementById("testModal"), { })).show();
                $("button[type='submit']").removeAttr("disabled");
              }
            }
          });
        });


        // Attach keyup event on Journal Description to update character count
        $("textarea[name='description']").keyup(function (event) {
          let chars = $(this).next();
          chars.html($(this).val().length + "/500");
        });


        window.addEventListener("beforeunload", function (event) {
          event.preventDefault();
          let confirmMessage = "\o/";

          return confirmMessage;
        });
      });


     
      

      
    </script> -->
    
    

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
            <div class="tab-pane fade show active" id="submit" >
              <div class="row">
                <h>Name of Author<span style="color: red;">*</span><h>
                <input type="text" class="form-control" name="author[]" id="name" required/>
                <h>Title</h>
                <input class="form-control" type="text" name="title" required/>
                <h class="form-label">Category<span style="color: red;">*</span></h>
                <input class="form-control" list="categories" type="text" name="genre">
                <datalist id="categories">
                  <option value="Arts"></option>
                  <option value="Biography"></option>
                  <option value="Business"></option>
                  <option value="Computer & Technology"></option>
                  <option value="Education & Reference"></option>
                  <option value="History"></option>
                  <option value="Literature & Fiction"></option>
                  <option value="Medical"></option>
                  <option value="Religion"></option>
                  <option value="Science & Mathematic"></option>
                  <option value="Social Science"></option>
                  <option value="Sports"></option>
                </datalist>
                <h>Place of Publication<span style="color: red;">*</span></h>
                <input type="text" class="form-control" name="publish-place"  id="place" required/>
                <h>Date of Publication<span style="color: red;">*</span></h>
                <div class="input-group">
                <input class="form-control" type="date" name="publish-date" id="date" required/>
                <i class="fas fa-calendar-alt input-group-text"></i>
                </div>  
                <h>Volume Number<span style="color: red;">*</span></h>
                <input type="number" class="form-control" name="volume"  id="volume" required/>
                <h>Issue Number<span style="color: red;">*</span></h>
                <input type="number" class="form-control" name="issue"id="issue" required/>
              </div>
              
              <div class="mb-3">
              <label class="form-label">Book File<span style="color: red;">*</span></label>
              <input class="form-control" type="file" name="journal-file" accept=".pdf" maxlength="1" required>
              <label class="form-label">Book Cover</label>
              <input class="form-control" type="file" name="journal-cover" accept="image/*" maxlength="1">
              <progress value="0" hidden></progress>
            </div>
            
        
                
              <div class="row">
                <div class="col">
                  <button style="background-color: #008000; border-radius: 50px; border: #008000 1px solid"  type="reset" class="btn btn-outline-primary">Reset</button>
                </div>
                <div class="col">
                  <button style="background-color: #008000; border-radius: 50px; border: #008000 1px solid" type="submit" class="btn btn-primary" href="/">Submit</button>
                </div>
              </div>
            </div>
            
          <div class="tab-pane fade" id="about"><!-- isi about taruh didalam ini-->
            <div class="row" id="ab1">
              <p>Journal Description</p>
              <textarea class="form control" name="description" maxlength="500" placeholder="Description..." id="msg"></textarea>
              <p>0/500</p>
              <p style="color: red;">* required</p>
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