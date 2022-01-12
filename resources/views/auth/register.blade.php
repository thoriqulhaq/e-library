<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <br>

            <!-- ID Number -->
            <div>
                <x-label for="id_number" :value="__('ID Number')" />

                <x-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" :value="old('id_number')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password Must be More than 7 Character"
                                required autocomplete="new-password"
                                onkeyup="checkPass(); return false;" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required
                                placeholder="Password Must be More than 7 Character"
                                onkeyup="checkPass(); return false;" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

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

    </x-auth-card>
</x-guest-layout>
