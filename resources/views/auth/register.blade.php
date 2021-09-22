<x-guest-layout>
    <x-register-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="appointment_form" method="POST" class="mt-30"  action="{{ route('register') }}" onsubmit="return checkValid()">
            @csrf

            <!-- Name -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-label for="name" :value="__('auth.name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required oninvalid="this.setCustomValidity('이름을 입력해주십시오.')" autofocus />
                    </div>
                </div>

            <!-- Email Address -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="email" :value="__('auth.email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" oninvalid="this.setCustomValidity('이메일을 입력해주십시오.')" required />
                </div>

            </div>

            <!-- Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password" :value="__('auth.pw')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" oninvalid="this.setCustomValidity('암호를 입력해주십시오.')"/>
                </div>

            </div>

            <!-- Confirm Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password_confirmation" :value="__('passwords.confirm_pw')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                    <span id='message'></span>
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.already_register') }}
                </a>

            </div>
                <div class="flex items-center justify-end mt-4 text-center mt-20">

                    <x-button class="ml-4">
                        {{ __('auth.register') }}
                    </x-button>
                </div>

        </form>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#appointment_form").validate({
                });
            });
            $('#password, #password_confirmation').on('keyup', function () {
                if ($('#password').val() == $('#password_confirmation').val()) {
                    $('#message').html('');
                } else
                    $('#message').html('암호가 일치하지 않습니다.').css('color', 'red');
            });
            function checkValid(){
                let pw = $('[name=password]').val();
                let con_pw = $('[name=password_confirmation]').val();
                if(pw !== ''){
                    if(con_pw === ''){
                        $('[name=password_confirmation]').parent().addClass('has-error');
                        return false;
                    }
                    else{
                        if(pw !== con_pw){
                            $('[name=password_confirmation]').parent().addClass('has-error');
                            return false;
                        }
                    }
                }
                return true;
            }
        </script>
    </x-register-card>
</x-guest-layout>
