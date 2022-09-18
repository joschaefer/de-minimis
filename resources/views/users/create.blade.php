<x-modal id="storeUserModal" action="{{ route('users.store') }}" title="{{ __('Add user') }}">
    <div class="row">
        <div class="col-md mb-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{ __('First name') }}" maxlength="255" value="{{ old('first_name') }}" autocomplete="off" spellcheck="false" required>
                <label for="first_name">{{ __('First name') }}</label>
            </div>
        </div>
        <div class="col-md mb-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="{{ __('Last name') }}" maxlength="255" value="{{ old('last_name') }}" autocomplete="off" spellcheck="false" required>
                <label for="last_name">{{ __('Last name') }}</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('Email address') }}" maxlength="255" value="{{ old('email') }}" autocomplete="off" spellcheck="false" required>
                <label for="email">{{ __('Email address') }}</label>
            </div>
        </div>
    </div>
</x-modal>
