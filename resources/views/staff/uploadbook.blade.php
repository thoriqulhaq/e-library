@extends('staff.main')
@section('title', 'Upload New Book')
@section('page')


    <script>
      var authorValue = [];
      var authorCount = 1;
      function addAuthor() {
        var value = document.getElementById("author").value

        $("#authors").children().eq(-1).before(
        `<div class="col-md-12 mt-2 mb-3">
              <div class="input-group input-group-sm">
                <input class="form-control" type="text" name="author[]" required value="` + value + `"/>
                <i class="input-group-text material-icons" style="color: red; font-size: 18.5px" onclick="deleteAuthor(this)">delete</i>
              </div>
            </div>`);
        
            authorCount++;
            authorValue.push(value);
            console.log(authorValue)
            document.getElementById("author").value = "";
      }

      function deleteAuthor(el) {
        $(el).parent().parent().remove();
      }
    </script>




    <div class="container" style="height: 100vh; padding-top: 180px">
      <h1 class="mb-5">Upload Book Form</h1>
      <form class="row g-3" action="{{ url('/uploadbook') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Title</label>
              <input class="form-control" type="text" name="title" placeholder="Title" required/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Genre</label>
              <input class="form-control" type="text" name="genre">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Publisher</label>
              <input class="form-control" type="text" name="publisher" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Place of Publication</label>
              <input class="form-control" type="text" name="publish-place" required/>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Date of Publication</label>
              <div class="input-group">
                <input class="form-control" type="date" name="publish-date" required/>
                <i class="fas fa-calendar-alt input-group-text"></i>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">ISBN</label>
              <input class="form-control" type="text" name="isbn" required/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Edition</label>
              <input class="form-control" type="text" name="edition">
            </div>
            <div class="mb-3">
              <label class="form-label">Book File</label>
              <input class="form-control" type="file" name="book-file">
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="row" id="authors">
            <div class="col-md-12 mb-3">
              <label class="form-label">Author</label>
              <div class="input-group input-group-sm">
                <input id="author" class="form-control" type="text" name="author[]"/>
                <i class="input-group-text material-icons" style="color: #008000; font-size: 18.5px" onclick="addAuthor()">add_box</i>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Description</label>
              <textarea class="form-control" name="description"></textarea>
              <p>0/500</p>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="btn-block">
            {{-- <button type="submit" class="btn btn-primary ps-4 pe-4" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Add</button> --}}
            <button type="submit" class="btn btn-primary ps-4 pe-4" href="/" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Send</button>
          </div>
        </div>
      </form>
    </div>

@endsection