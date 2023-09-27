<x-base-layout>
    <form action="{{ route('users.update', $user) }}" method="POST" accept-charset="UTF-8" autocomplete="off" autocapitalize="off">
        @csrf
        @method('PUT')

        <header class="d-flex justify-content-between align-items-center mb-5">
            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
        </header>

        <x-status :status="session('status')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        <div class="row">
            <div class="col-md mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Vorname" maxlength="100" value="{{ old('first_name', $user->first_name) }}" autocomplete="off" spellcheck="false" required>
                    <label for="first_name">{{ __('First name') }}</label>
                </div>
            </div>
            <div class="col-md mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nachname" maxlength="100" value="{{ old('last_name', $user->last_name) }}" autocomplete="off" spellcheck="false" required>
                    <label for="last_name">{{ __('Last name') }}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-Mail-Adresse" maxlength="255" value="{{ old('email', $user->email) }}" autocomplete="off" spellcheck="false" required>
                    <label for="email">{{ __('Email address') }}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mb-3">
                <div class="form-floating">
                    <select name="role_id" class="form-select" aria-label="Rolle">
                        <option value="">– keine Rolle –</option>
                        @foreach(\Spatie\Permission\Models\Role::all()->sortBy('name') as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', $user->roles->first()?->id) == $role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                    <label>{{ __('Role') }} ({{ __('optional') }})</label>
                </div>
            </div>
        </div>
        <x-button color="success" type="submit">{{ __('Save') }}</x-button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
    </form>
</x-base-layout>
