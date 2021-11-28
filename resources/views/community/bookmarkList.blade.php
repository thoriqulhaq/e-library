@extends('community.main')
@section('title', 'Bookmark')
@section('page')

              <br>
              <div class="text-center mx-3" style="height:100vh;">
                <h4 >Bookmark Collection<br></h4>
                
                
                  <table class="table table-borderless">
                    <thead>
                      <tr class="">
                        <th></th>
                        <th></th>
                        
                        <th style="width: 33.3%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td>
                         
                        </td>
                        
                        <td >
                          <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <ion-icon class="p-0 m-0" name="create-outline"></ion-icon>
                          </button>
                          <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <ion-icon class="p-0 m-0" name="trash-outline"></ion-icon>
                          </button>
                        </td>
                      </tr>

                      
                    </tbody>
                  </table>
                
              </div>
          @endsection   
            