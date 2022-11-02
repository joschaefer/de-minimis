<x-guest-layout>
    <main>
        <x-status :status="session('status')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        {{ $slot }}

        <small class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} {{ config('app.copyright') }}</small>
    </main>
</x-guest-layout>
