
@extends('community.main')
@section('title', 'add-account')
@section('page')

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="bg-white" style="border-radius: 40px; padding: 20px;">
        <!-- <div class="row no-gutters"> -->
          <div class="">
            <div class="card-body">
              <h1 class="login-card-description">Add an Admin Account</h1>
              <form action="{{ route('addAccount') }}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input type="name" name="name" id="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control " placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="password" class="sr-only">Re-enter Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="d-flex justify-content-center mt-5 ">
                    <button name="login" id="login" class="btn btn-block login-btn mx-2 mb-4 btn-success" type="submit">
                      Add
                    </button>
                  </form>
                    <a href="{{url('/account-manager')}}" name="back" class="btn  login-btn mb-4 btn-danger ml-2">
                      Back
                    </a>
                  </div>

            </div>
          <!-- </div> -->
        </div>
      </div>
      
    </div>
  </main>

  

@endsection   