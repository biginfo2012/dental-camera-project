<x-guest-layout>
    <x-forgot-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600" style="margin-bottom: 15px;">
            {{ __('passwords.forgot_sentence') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="row">
                <div class="form-group col-md-12">
                    <x-label for="email" :value="__('auth.email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('passwords.reset_link') }}
                </x-button>
            </div>
        </form>
    </x-forgot-card>
</x-guest-layout>
