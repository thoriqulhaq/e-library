@extends('community.main')
@section('title', 'Bookmark')
@section('page')
<style>@import url(https://fonts.googleapis.com/css?family=Open+Sans);
.search {
  width: 100%;
  display: flex;
  position:relative fixed;
}

.searchTerm {
  width: 100%;
  border: 0.5px solid;
  border-right: none;
  padding: 5px;
  height: 33px;
  border-radius: 5px 0 0 5px;
  outline: none;

}



.searchButton {
  width: 40px;
  height: 36px;
  border: 0.5px solid;
  background: black;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position:relative ;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>
              <div class="container position-relative mt-5" style="padding: 120px 0; ">
              <div class="text-center" style="height:100vh;">
              <h3>Search Content</h3><br>
              <form action="{{ url('/searchContent') }}" method="GET">
                <div class="wrap">
                    <div class="search">
                    <input class="form-control searchTerm" type="text" name="title" placeholder="Title">
                    <input class="form-control searchTerm" type="text" name="author" placeholder="Author">
                    
                    <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                    </button>
                    </div>
                </div>
               </form>
                        <div class="col-lg-12">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Genre</th>
                                        <th>Publishing Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $res)
                                    <tr>
                                        
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{ $res->title }}</a></td>
                                        <td><a href="{{ url('/book/' . $res->id) }}">
                                            @if ($res->description == null)
                                            <p>No Description</p>
                                            @else
                                            {{ $res->description }}</a>
                                        </td>@endif
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{$res->genre}}</td>
                                        <td><a href="{{ url('/book/' . $res->id) }}">{{$res->publication_date}}</td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            
              </div>    
              </div>
              <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>
               
          @endsection   