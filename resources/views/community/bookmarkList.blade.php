@extends('community.main')
@section('title', 'Bookmark')
@section('page')

              <div class="container position-relative mt-5" style="padding: 120px 0; ">
              <div class="text-center" style="height:100vh;">
                <h4 >Bookmark Collection<br></h4>
                
                
                
                  <table class="table table-borderedtext-center" style="">
                    <thead>
                      <tr class="">
                        <th></th>
                        
                        
                        <th style="width:50%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($academicResource as $datas)
                      <tr>
                        <td >
                       <a  href="{{url('/book/' . $datas->id)}}" style="color: inherit"> {{$datas->title}} </a>
                        
                          
                      
                      </td>
                       
                        
                        <td >
                          
                          <a  href="{{url('/delete-bookmark/' . $datas->id)}}" type="button" class="btn"data-toggle="tooltip" data-original-title="Delete">
                            <ion-icon size="large" name="trash"></ion-icon>
                          </a>
                        </td>
                      </tr>

                      

                      @endforeach
                    </tbody>
                  </table>
                </div>

                <script>

                  

                </script>
              </div>
              
               
          @endsection   
            