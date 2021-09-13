<div class="col-md-6 col-md-push-3 sm:justify-center sm:pt-0">
    <div class="text-center mb-60">
        {{ $logo }}
    </div>

    <div class="bg-lightest border-1px p-25 sm:max-w-md sm:rounded-lg">
        <h4 class="text-theme-colored text-uppercase m-0">{{ __('passwords.forgot_password') }}</h4>
        <div class="line-bottom mb-30"></div>
        {{ $slot }}
    </div>
</div>
