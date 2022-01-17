
@extends('staff.main')
@section('title', 'add-account')
@section('page')

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="bg-white" style="border-radius: 40px; padding: 20px;">
        <!-- <div class="row no-gutters"> -->
          <div class="">
            <div class="card-body">
              <h1 class="login-card-description">Add an Admin Account</h1>
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <form action="{{ route('addAccount') }}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="name" class="sr-only">Name</label>
                    <input type="name" name="name" id="name" class="form-control" placeholder="Name" required>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group">
                    <x-label for="password" :value="__('Password')" />

                <x-input id="password" 
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Password Must be More than 7 Character"
                                required autocomplete="new-password"
                                onkeyup="checkPass(); return false;" />
                  </div>
                  <div class="form-group">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" 
                class="form-control"
                                type="password"
                                name="password_confirmation" required
                                placeholder="Password Must be More than 7 Character"
                                onkeyup="checkPass(); return false;" />
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
      
    <script>
            function checkPass()
            {
                var pass = document.getElementById('pass');
                var re_pass = document.getElementById('re_pass');
                var message = document.getElementById('error-nwl');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                
                if(pass.value.length > 4)
                {
                    pass.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Character number ok!"
                }
                else
                {
                    pass.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = " You have to enter at least 5 digit!"
                    return;
                }
                
                if(pass.value == re_pass.value)
                {
                    re_pass.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = "Ok!"
                }
                else
                {
                    re_pass.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = " These passwords don't match"
                }
            }
        </script>
  </main>

  

@endsection  