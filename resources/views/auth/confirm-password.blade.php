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

        <form action="{{ route('password.confirm') }}" method="post" accept-charset="UTF-8">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Bitte Passwort bestätigen</h1>
            <p class="small text-muted">Als zusätzliche Sicherheitsmaßnahme musst Du zunächst Dein aktuelles Passwort eingeben.</p>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Passwort" autocomplete="current-password" required>
                <label for="password">Passwort</label>
            </div>

            <x-button class="btn-lg w-100 mt-3" type="submit">Bestätigen</x-button>

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} Johannes Schäfer</p>
        </form>
    </main>
</x-guest-layout>
