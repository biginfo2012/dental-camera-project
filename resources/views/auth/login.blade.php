<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form id="appointment_form" name="appointment_form" class="mt-30" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="row">
                <div class="form-group col-md-12">
                    <x-label for="email" :value="__('auth.email')" />

                    <x-input id="email" class="block mt-1 w-full required email" type="email" name="email" :value="old('email')" required autofocus aria-required="true"/>
                </div>
            </div>

            <!-- Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password" :value="__('auth.pw')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password" name="password"
                             required autocomplete="current-password" aria-required="true"/>
                </div>

            </div>

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('passwords.forgot_password') }}
                    </a>
                @endif

            </div>
                <div class="flex items-center justify-end mt-4 text-center mt-20">

                    <x-button class="ml-3">
                        {{ __('auth.login') }}
                    </x-button>
                </div>
        </form>
    </x-auth-card>
    <script>
        $(document).ready(function(){
            $("#appointment_form").validate({
            });
        });
    </script>
</x-guest-layout>
