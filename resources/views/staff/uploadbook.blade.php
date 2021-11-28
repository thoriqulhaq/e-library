<!DOCTYPE html>
<html>
  <head>
    <title>Upload New Book</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      var authorCount = 1;
      function addAuthor() {
        $("#authors").children().eq(-1).before(
        `<div class="col-md-12">
              <label class="form-label">Author</label>
              <div class="input-group input-group-sm">
                <input class="form-control" type="text" name="author[]" required/>
                <i class="input-group-text material-icons" style="color: red; font-size: 18.5px" onclick="deleteAuthor(this)">delete</i>
              </div>
            </div>`);
        
            authorCount++;
      }

      function deleteAuthor(el) {
        $(el).parent().parent().remove();
      }
    </script>

    <!--
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      margin: 15px 0;
      font-weight: 400;
      }
      h4 {
      margin-bottom: 4px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input, select, textarea {
      width: 100%;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input:hover, textarea:hover, select:hover {
      outline: none;
      border: 1px solid #095484;
      }
      select {
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      margin-bottom: 3px;
      }
      .item {
      position: relative;
      display: flex;
      flex-direction: column;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      left: 94%;
      top: 30px;
     z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      left: 93%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .street, .desired-outcome-item, .complaint-details-item {
      display: flex;
      flex-wrap: wrap;
      }
      .street input {
      margin-bottom: 10px;
      }
      small {
      display: block;
      line-height: 16px;
      opacity: 0.7;
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      input {
      width: calc(35% - 20px);
      margin: 0 0 0 8px;
      }
      select {
      width: calc(50% - 8px);
      margin: 0 0 10px 8px;
      }
      .item {
      flex-direction: row;
      align-items: center;
      }
      .item p {
      width: 30%;
      }
      .item i {
      left: 61%;
      top: 25%;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      left: 60%;
      }
      .street, .desired-outcome-item, .complaint-details-item {
      width: 70%;
      }
      .street input {
      width: calc(50% - 20px);
      }
      .street .street-item {
      width: 100%;
      }
      .address p, .desired-outcome p, .complaint-details p {
      align-self: flex-start;
      margin-top: 6px;
      }
      .desired-outcome-item, .complaint-details-item {
      margin-left: 12px;
      }
      textarea {
      width: calc(100% - 6px);
      }
      }
    </style>
    -->

  </head>



  <body>
    <div class="container">
      <h1>Upload Book Form</h1>
      <form class="row g-3" action="{{ url('/uploadbook') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <label class="form-label">Book Title</label>
              <input class="form-control" type="text" name="title" placeholder="Title" required/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Genre</label>
              <input class="form-control" type="text" name="genre">
            </div>
            <div class="col-md-6">
              <label class="form-label">Publisher</label>
              <input class="form-control" type="text" name="publisher" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Place of Publication</label>
              <input class="form-control" type="text" name="publish-place" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label">Date of Publication</label>
              <div class="input-group">
                <input class="form-control" type="date" name="publish-date" required/>
                <i class="fas fa-calendar-alt input-group-text"></i>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">ISBN</label>
              <input class="form-control" type="text" name="isbn" required/>
            </div>
            <div class="col-md-6">
              <label class="form-label">Edition</label>
              <input class="form-control" type="text" name="edition">
            </div>
            <div class="mb-3">
              <label class="form-label">Book File</label>
              <input class="form-control" type="file" name="book-file">
            </div>
            <div class="btn-block">
              <button type="submit" href="/">Send</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row" id="authors">
            <div class="col-md-12">
              <label class="form-label">Author</label>
              <div class="input-group input-group-sm">
                <input class="form-control" type="text" name="author[]" required/>
                <i class="input-group-text material-icons" style="color: blue; font-size: 18.5px" onclick="addAuthor()">add_box</i>
              </div>
            </div>
            <div class="col-md-12">
              <label class="form-label">Book Description</label>
              <textarea class="form-control" name="description"></textarea>
              <p>0/500</p>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>