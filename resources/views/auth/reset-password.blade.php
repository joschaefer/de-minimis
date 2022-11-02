<x-auth-layout>
    <form action="{{ route('password.update') }}" method="post" accept-charset="UTF-8">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <h1 class="h3 mb-3 fw-normal">{{ __('Please set a new password') }}</h1>

        <div class="form-floating text-start mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@beispiel.de" value="{{ old('email', $request->email) }}" autocomplete="username" required autofocus>
            <label for="email">{{ __('Email address') }}</label>
        </div>
        <div class="form-floating text-start">
            <input type="password" name="password" class="form-control input-top" id="password" placeholder="{{ __('Password') }}" autocomplete="new-password" required>
            <label for="password">{{ __('Password') }}</label>
        </div>
        <div class="form-floating text-start">
            <input type="password" name="password_confirmation" class="form-control input-bottom" id="password_confirmation" placeholder="{{ __('Password confirmation') }}" autocomplete="new-password" required>
            <label for="password_confirmation">{{ __('Password confirmation') }}</label>
        </div>

        <x-button class="btn-lg w-100 mt-3" type="submit">{{ __('Reset password') }}</x-button>
    </form>
</x-auth-layout>
