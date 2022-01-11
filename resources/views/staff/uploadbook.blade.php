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

@extends('staff.main')
@section('title', 'Upload New Book')
@section('page')


    <script>
      $(document).ready(function () {

        $("form").submit(function (event) {
          event.preventDefault();
          
          // Check for edition
          let edition = $("input[name='edition']");
          if (isNaN(edition.val())) {
            edition[0].setCustomValidity("This field must be a number");
            edition[0].reportValidity();
            edition[0].setCustomValidity("");
            return;
          }

          // Check for ISBN
          let isbn = $("input[name='isbn']");
          let sum = 0;
          for (let i = 0; i < isbn.val().length; i++) {
            sum += (isbn.val()[i] * Math.floor(3 / ((i + 1) % 2 + 1)));
          }
          if ((sum % 10 != 0) || isNaN(isbn.val())) {
            isbn[0].setCustomValidity("ISBN is invalid");
            isbn[0].reportValidity();
            isbn[0].setCustomValidity("");
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
            url: "{{ url('/uploadbook') }}",
            method: "POST",
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
            contentType: false,
            data: new FormData($("form")[0]),
            processData: false,

            error: function (xhr, status, err) {
              $(".modal-body").html("Fail to upload book: " + xhr.responseText);

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




    <div class="container" style="height: 100vh; padding-top: 50px">
      <h1 class="mb-5">Upload Book</h1>
      <form class="row g-3" action="{{ url('/uploadbook') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Title<span style="color: red;">*</span></label>
              <input class="form-control" type="text" name="title" required/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Category<span style="color: red;">*</span></label>
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
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Publisher<span style="color: red;">*</span></label>
              <input class="form-control" type="text" name="publisher" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Place of Publication<span style="color: red;">*</span></label>
              <input class="form-control" type="text" name="publish-place" required/>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Date of Publication<span style="color: red;">*</span></label>
              <div class="input-group">
                <input class="form-control" type="date" name="publish-date" required/>
                <i class="fas fa-calendar-alt input-group-text"></i>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">ISBN (ISBN-13 only)<span style="color: red;">*</span></label>
              <input class="form-control" type="text" name="isbn" minlength="13" maxlength="13" required/>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Edition</label>
              <input class="form-control" type="text" name="edition">
            </div>
            <div class="mb-3">
              <label class="form-label">Book File<span style="color: red;">*</span></label>
              <input class="form-control" type="file" name="book-file" accept=".pdf" maxlength="1" required>
              <label class="form-label">Book Cover</label>
              <input class="form-control" type="file" name="book-cover" accept="image/*" maxlength="1">
              <progress value="0" hidden></progress>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="row" id="authors">
            <div class="col-md-12 mb-3">
              <label class="form-label">Author<span style="color: red;">*</span></label>
              <div class="input-group input-group-sm">
                <input id="author" class="form-control" type="text" name="author[]" required/>
                <i class="input-group-text material-icons" style="color: #008000; font-size: 18.5px" onclick="addAuthor()">add_box</i>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label class="form-label">Book Description</label>
              <textarea class="form-control" name="description" maxlength="500"></textarea>
              <p>0/500</p>
              <p style="color: red;">* required</p>
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