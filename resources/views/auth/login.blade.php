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

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <main class="form-signin">
        <x-status :status="session('status')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        <form action="{{ route('login') }}" method="post" accept-charset="UTF-8">
            @csrf

            <h1 class="h3 mb-3 fw-normal">{{ __('Please log in') }}</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('name@example.com') }}" value="{{ old('email') }}" autocomplete="username" spellcheck="false" required autofocus>
                <label for="email">{{ __('Email address') }}</label>
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="{{ __('Password') }}" autocomplete="current-password" required>
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

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} Johannes Schäfer</p>
        </form>
    </main>
</x-guest-layout>
