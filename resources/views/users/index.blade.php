<x-base-layout>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Users') }}</h1>
        @can('create', \App\Models\User::class)
            <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeUserModal">{{ __('Add user') }}</x-button>
        @endcan
    </div>

    <x-status :status="session('status')" class="mb-3" />

    @if(session()->exists('user'))
        <x-alert color="primary">
            {{ __('Email address') }}: {{ session('user')->email }}<br>
            {{ __('Password') }}: {{ session('password') }}
        </x-alert>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('Last name') }}</th>
                <th>{{ __('First name') }}</th>
                <th>{{ __('Email address') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="text-muted">{{ $users->count() }} {{ __('users found') }}.</p>

    @can('create', \App\Models\User::class)
        <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeUserModal">{{ __('Add user') }}</x-button>
        @include('users.create')
    @endcan
</x-base-layout>
