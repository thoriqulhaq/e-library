@extends('community.main')
@section('title', 'Bookmark')
@section('page')

              <div class="container position-relative mt-5" style="padding: 120px 0; ">
              <div class="text-center" style="height:100vh;">
                <h4 >Bookmark Collection<br></h4>
                
                @foreach ( $bookmarks as $bookmark )
                  <table class="table table-borderless text-center" style="">
                    <thead>
                      <tr class="">
                        <th></th>
                        
                        
                        <th style="width:50%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td >
                        {{ $post->id }}
                        
                          
                      
                      </td>
                       
                        
                        <td >
                          <button type="button" class="btn " data-toggle="tooltip" data-original-title="Edit">
                            <ion-icon size="large" name="create"></ion-icon>
                          </button>
                          <button type="button" class="btn"data-toggle="tooltip" data-original-title="Delete">
                            <ion-icon size="large" name="trash"></ion-icon>
                          </button>
                        </td>
                      </tr>

                      
                    </tbody>
                  </table>
                </div>

                <script>

                  

                </script>
              </div>
              @endforeach
          @endsection   
            