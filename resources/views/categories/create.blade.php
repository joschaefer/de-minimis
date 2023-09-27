<x-modal id="storeCategoryModal" action="{{ route('categories.store') }}" title="{{ __('Add category') }}">
    <div class="row">
        <div class="col-md mb-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }}" maxlength="255" value="{{ old('name') }}" autocomplete="off" spellcheck="false" required>
                <label for="name">{{ __('Name') }}</label>
            </div>
        </div>
    </div>
</x-modal>
