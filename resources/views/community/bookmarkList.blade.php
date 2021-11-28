@extends('community.main')
@section('title', 'Bookmark')
@section('page')

              <div class="container position-relative mt-5" style="padding: 120px 0; ">
              <div class="text-center" style="height:100vh;">
                <h4 >Bookmark Collection<br></h4>
                @foreach($academic_resources as $key => $data)
                
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
                        <img src="https://drive.google.com/uc?export=view&id=14r5VEmUBjaVOYQgJ8sZrRXRTLK15YJvv" height=200 width=200>
                        <ion-icon size="large" name="bookmark"></ion-icon>
                        <br>
                        {{$data->title}}<br>
                          
                      
                      </td>
                       
                        
                        <td >
            
                          <img src="https://drive.google.com/uc?export=view&id=14r5VEmUBjaVOYQgJ8sZrRXRTLK15YJvv" height=200 width=200>
                        <ion-icon size="large" name="bookmark"></ion-icon>
                        <br>
                        {{$data->title}}<br>
                        </td>
                      </tr>

                      
                    </tbody>
                  </table>
                </div>
              </div>
              @endforeach
          @endsection   
            