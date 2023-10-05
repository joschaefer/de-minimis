<x-base-layout>
    <form action="{{ route('categories.update', $category) }}" method="POST" accept-charset="UTF-8" autocomplete="off" autocapitalize="off">
        @csrf
        @method('PUT')

        <header class="d-flex justify-content-between align-items-center mb-5">
            <h1>{{ __('Edit category') }}</h1>
        </header>

        <x-status :status="session('success')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        <div class="row">
            <div class="col-md mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }}" maxlength="255" value="{{ old('name', $category->name) }}" autocomplete="off" spellcheck="false" required>
                    <label for="name">{{ __('Name') }}</label>
                </div>
            </div>
        </div>

        <x-button color="success" type="submit">{{ __('Save') }}</x-button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
    </form>
</x-base-layout>
