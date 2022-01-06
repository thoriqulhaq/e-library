@extends('staff.main')
@section('title', 'Edit Book')
@section('page')


    <script>
      
      $(document).ready(function () {

        // Attach keyup event on Book Description to update character count
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

      // Function to add more Author input fields
      // Limit to 5 input fields
      // First input field changed to delete after 5 fields
      // Changed back to add when deletion of one input field
      var authorValue = [];
      var authorCount = 1;
      function addAuthor() {
        var value = document.getElementById("authors").value

        // Find the last row (book description) and add input field before it
        let currentElement = $("#authors").children();
        currentElement.eq(-1).before(
        `<div class="col-md-12 mt-2 mb-3">
              <div class="input-group input-group-sm">
                <input class="form-control" type="text" name="author[]" required value="` + value + `"/>
                <i class="input-group-text material-icons" style="color: red; font-size: 18.5px" onclick="deleteAuthor(this)">delete</i>
              </div>
            </div>`);
        
            authorCount++;
            authorValue.push(value);
            console.log(authorValue)
            document.getElementById("authors").value = "";

            // Change the first input field add button to delete, limit 5 authors
            if (authorCount >= 5) {
              currentElement.eq(0).find("i")
              .attr("onclick", "deleteAuthor(this)")
              .css("color", "red")
              .html("delete");

            }
      }

      // Delete the Author input field
      function deleteAuthor(el) {
        let currentElement = $(el).parent().parent();

        // First input field has "label" tag, if will be deleted, put new label on second field before deletion
        if (currentElement.has("label").length) {
          currentElement.next().removeClass("mt-2")
          .prepend("<label class='form-label'>Author</label>");
        }

        currentElement.remove();

        // Change back the first Author input field to add if 5 authors limit is reached
        currentElement = $("#authors").children().eq(0);
        if (authorCount >= 5) {
          currentElement.find("i")
          .attr("onclick", "addAuthor()")
          .css("color", "#008000")
          .html("add_box");
        }

        authorCount--;
      }
    </script>




    <div class="container" style="height: 100vh; padding-top: 180px">
      <h1 class="mb-5">Edit Book</h1>
      <form class="row g-3" action="{{ url('/editbook/' . $id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Title</label>
              <input class="form-control" type="text" name="title" placeholder="Title" required value="{{ $book->title }}"/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Genre</label>
              <input class="form-control" type="text" name="genre" value="{{ $book->genre }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Publisher</label>
              <input class="form-control" type="text" name="publisher" required value="{{ $bookDetails->publisher }}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Place of Publication</label>
              <input class="form-control" type="text" name="publish-place" required value="{{ $book->publication_place }}"/>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Date of Publication</label>
              <div class="input-group">
                <input class="form-control" type="date" name="publish-date" required value="{{ $book->publication_date }}"/>
                <i class="fas fa-calendar-alt input-group-text"></i>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">ISBN</label>
              <input class="form-control" type="text" name="isbn" required value="{{ $bookDetails->isbn }}"/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Edition</label>
              <input class="form-control" type="text" name="edition" value="{{ $bookDetails->edition }}">
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="row" id="authors">
            @php
              $counter = 0;
            @endphp
            @foreach ($authors as $author)
            <div class="col-md-12 mb-3">
              @if ($counter == 0)
              <label class="form-label">Author</label>
              @endif
              <div class="input-group input-group-sm">
                @if ($counter == 0 && count($authors) != 5)
                <input id="author" class="form-control" type="text" name="author[]" value="{{ $author->name }}"/>
                <i class="input-group-text material-icons" style="color: #008000; font-size: 18.5px" onclick="addAuthor()">add_box</i>
                @else
                <input class="form-control" type="text" name="author[]" value="{{ $author->name }}"/>
                <i class="input-group-text material-icons" style="color: red; font-size: 18.5px" onclick="deleteAuthor(this)">delete</i>
                @endif
              </div>
            </div>
            @php
              $counter++;
            @endphp
            @endforeach
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Description</label>
              <textarea class="form-control" name="description">{{ $book->description }}</textarea>
              <p>{{ strlen($book->description) }}/500</p>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="btn-block">
            {{-- <button type="submit" class="btn btn-primary ps-4 pe-4" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Add</button> --}}
            <button type="submit" class="btn btn-primary ps-4 pe-4" href="/" style="background-color: #008000; border-radius: 50px; border: #008000 1px solid">Save</button>
          </div>
        </div>
      </form>
    </div>

@endsection