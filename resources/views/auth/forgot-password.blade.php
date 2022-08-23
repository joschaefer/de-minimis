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
    </style>
    <main class="form-signin">
        <x-status :status="session('status')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        <form action="{{ route('password.email') }}" method="post" accept-charset="UTF-8">
            @csrf

            <h1 class="h3 mb-3 fw-normal">{{ __('Reset password') }}</h1>
            <p class="small text-muted">{{ __('Forgotten your password? No problem. Enter your email address and we’ll send you a link to set a new password.') }}</p>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('name@example.com') }}" value="{{ old('email') }}" autocomplete="username" required autofocus>
                <label for="email">{{ __('Email address') }}</label>
            </div>

            <x-button class="btn-lg w-100 mt-3" type="submit">{{ __('Send link') }}</x-button>

            <p class="small mt-3"><a class="text-muted" href="{{ route('login') }}">{{ __('Not forgotten after all?') }}</a></p>

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} Johannes Schäfer</p>
        </form>
    </main>
</x-guest-layout>
