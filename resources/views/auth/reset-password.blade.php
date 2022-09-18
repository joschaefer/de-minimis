<x-guest-layout>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input.top {
            margin-top: 10px;
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input.bottom {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <main class="form-signin">
        <x-errors :errors="$errors" class="mb-3" />

        <form action="{{ route('password.update') }}" method="post" accept-charset="UTF-8">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <h1 class="h3 mb-3 fw-normal">{{ __('Please set a new password') }}</h1>

            <div class="form-floating text-start">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@beispiel.de" value="{{ old('email', $request->email) }}" autocomplete="username" required autofocus>
                <label for="email">{{ __('Email address') }}</label>
            </div>
            <div class="form-floating text-start">
                <input type="password" name="password" class="form-control top" id="password" placeholder="{{ __('Password') }}" autocomplete="new-password" required>
                <label for="password">{{ __('Password') }}</label>
            </div>
            <div class="form-floating text-start">
                <input type="password" name="password_confirmation" class="form-control bottom" id="password_confirmation" placeholder="{{ __('Password confirmation') }}" autocomplete="new-password" required>
                <label for="password_confirmation">{{ __('Password confirmation') }}</label>
            </div>

            <x-button class="btn-lg w-100 mt-3" type="submit">{{ __('Reset password') }}</x-button>

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} Johannes Schäfer</p>
        </form>
    </main>
</x-guest-layout>
