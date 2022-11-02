<x-auth-layout>
    <form action="{{ route('login') }}" method="post" accept-charset="UTF-8">
        @csrf

        <h1 class="h3 mb-3 fw-normal">{{ __('Please log in') }}</h1>

        <div class="form-floating text-start">
            <input type="email" name="email" class="form-control input-top" id="email" placeholder="{{ __('name@example.com') }}" value="{{ old('email') }}" autocomplete="username" spellcheck="false" required autofocus>
            <label for="email">{{ __('Email address') }}</label>
        </div>

        <div class="form-floating text-start">
            <input type="password" name="password" class="form-control input-bottom" id="password" placeholder="{{ __('Password') }}" autocomplete="current-password" required>
            <label for="password">{{ __('Password') }}</label>
        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input name="remember" class="form-check-input" type="checkbox" @if(old('remember')) checked @endif>
                {{ __('Stay logged in') }}
            </label>
        </div>

        <x-button class="btn-lg w-100 mt-3" type="submit">{{ __('Login') }}</x-button>

        @if(\Illuminate\Support\Facades\Route::has('password.request'))
            <p class="small mt-3"><a class="text-muted" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a></p>
        @endif
    </form>
</x-auth-layout>
