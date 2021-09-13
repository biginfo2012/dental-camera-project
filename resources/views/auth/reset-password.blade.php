<x-guest-layout>
    <x-reset-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="row">
                <div class="form-group col-md-12">
                    <x-label for="email" :value="__('auth.email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

            </div>

            <!-- Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password" :value="__('auth.pw')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div>

            </div>

            <!-- Confirm Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password_confirmation" :value="__('passwords.confirm_pw')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('passwords.reset_pw') }}
                </x-button>
            </div>
        </form>
    </x-reset-card>
</x-guest-layout>
