<x-auth-layout>
    <form action="{{ route('password.email') }}" method="post" accept-charset="UTF-8">
        @csrf

        <h1 class="h3 mb-3 fw-normal">{{ __('Reset password') }}</h1>
        <p class="small text-muted">{{ __('Forgotten your password? No problem. Enter your email address and we’ll send you a link to set a new password.') }}</p>

        <div class="form-floating text-start">
            <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('name@example.com') }}" value="{{ old('email') }}" autocomplete="username" required autofocus>
            <label for="email">{{ __('Email address') }}</label>
        </div>

        <x-button class="btn-lg w-100 mt-3" type="submit">{{ __('Send link') }}</x-button>

        <p class="small mt-3"><a class="text-muted" href="{{ route('login') }}">{{ __('Not forgotten after all?') }}</a></p>
    </form>
</x-auth-layout>
