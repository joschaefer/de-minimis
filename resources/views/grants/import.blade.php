<x-modal id="importGrantsModal" action="{{ isset($company) ? route('companies.grants.import', $company) : route('grants.import') }}" title="{{ __('Import grants') }}" button-text="{{ __('Import') }}">
    <div class="form-floating mb-3">
        <select name="company_id" class="form-select" aria-label="{{ __('Company') }}" @isset($company) disabled @else required @endisset>
            <option value="" disabled hidden>{{ __('Please select') }}</option>
            @isset($company)
                <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
            @else
                @foreach(\App\Models\Company::query()->orderBy('name')->get() as $company)
                    <option value="{{ $company->id }}" @if(old('company_id') === $company->id) selected @endif>{{ $company->name }}</option>
                @endforeach
            @endisset
        </select>
        <label>{{ __('Company') }}</label>
    </div>
    <div class="form-floating mb-3">
        <select name="category_id" class="form-select" aria-label="{{ __('Category') }}" required>
            <option value="" disabled hidden>{{ __('Please select') }}</option>
            @foreach(\App\Models\Category::query()->orderBy('name')->get() as $category)
                <option value="{{ $category->id }}" @if(old('category_id') === $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <label>{{ __('Category') }}</label>
    </div>
    <input class="form-control" type="file" name="list" accept="{{ implode(',', \App\Services\SpreadsheetParser::getSupportedFileEndings()) }}" required>
</x-modal>
