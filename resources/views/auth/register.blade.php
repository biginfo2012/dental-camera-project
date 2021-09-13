<x-guest-layout>
    <x-register-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="mt-30"  action="{{ route('register') }}">
            @csrf

            <!-- Name -->
                <div class="row">
                    <div class="form-group col-md-12">
                        <x-label for="name" :value="__('auth.name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                </div>

            <!-- Email Address -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="email" :value="__('auth.email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

            </div>

            <!-- Password -->
            <div class="row mt-4">
                <div class="form-group col-md-12">
                    <x-label for="password" :value="__('auth.pw')" />

                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.already_register') }}
                </a>

                <x-button class="ml-4">
                    {{ __('auth.register') }}
                </x-button>
            </div>
        </form>
    </x-register-card>
</x-guest-layout>
