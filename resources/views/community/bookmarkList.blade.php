@extends('community.main')
@section('title', 'Bookmark')
@section('page')

              <div class="container position-relative mt-5" style="padding: 120px 0; ">
              <div class="text-center" style="height:100vh;">
                <h4 class="mb-5">Bookmarks<br></h4>
                
                
                
                  <table class="table text-center align-middle table-responsive" style="background-color: rgb(103,103,103); border-radius: 30px; box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                  -webkit-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);
                  -moz-box-shadow: 0px 0px 23px -12px rgba(74,74,74,0.8);">
                    <tbody>
                      @if(count($academicResource) != 0)
                      @foreach ($academicResource as $datas)
                      <tr>
                          <td style="width:33.3%; color: white !important; border-bottom:none !important">
                            <a href="{{url('/book/' . $datas->id)}}">  
                            
                              <img src="https://elibbucket.s3.ap-southeast-1.amazonaws.com/Cover/{{$datas->cover_path}}"  width="160" height="200"  alt="...">
                              
                            </a>
                      </td>
                        <td style="width:33.3%; color: white !important; border-bottom:none !important">
                          
                       <a  class="text-decoration-none" href="{{url('/book/' . $datas->id)}}" style="color: inherit"> {{$datas->title}} </a>

                        </td>
                        <td style="width:33.3%; color: white !important; border-bottom:none !important">
                           <a  href="{{url('/delete-bookmark/' . $datas->id)}}" type="button" class="btn"data-toggle="tooltip" data-original-title="Delete">
                              <ion-icon style="font-size: 24px" name="trash"></ion-icon>
                           </a>
                          </td>
                      </tr>
                      @endforeach
                      @else
                        <tr>
                          <td colspan="3" style="color: white !important; border-bottom:none !important">No Bookmark Found</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>

                <script>

                  

                </script>
              </div>
              
               
          @endsection   
            