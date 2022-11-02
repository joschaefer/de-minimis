<x-auth-layout>
    <form action="{{ route('password.confirm') }}" method="post" accept-charset="UTF-8">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Bitte Passwort bestätigen</h1>
        <p class="small text-muted">Als zusätzliche Sicherheitsmaßnahme musst Du zunächst Dein aktuelles Passwort eingeben.</p>

        <div class="form-floating text-start">
            <input type="password" name="password" class="form-control" id="password" placeholder="Passwort" autocomplete="current-password" required>
            <label for="password">Passwort</label>
        </div>

        <x-button class="btn-lg w-100 mt-3" type="submit">Bestätigen</x-button>
    </form>
</x-auth-layout>
