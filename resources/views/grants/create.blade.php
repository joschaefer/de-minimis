<x-modal id="storeGrantModal" action="{{ isset($company) ? route('companies.grants.store', $company) : route('grants.store') }}" title="{{ __('Add grant') }}">
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
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="description" id="description" placeholder="{{ __('Description') }}" value="{{ old('description') }}" required>
        <label for="description">{{ __('Description') }}</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" name="amount" id="amount" placeholder="{{ __('Amount') }}" value="{{ old('amount') }}" step=".01" min="0" required>
        <label for="amount">{{ __('Amount') }}</label>
    </div>
    <div class="row">
        <div class="col" id="startCol">
            <div class="form-floating">
                <input type="date" class="form-control" name="start" id="start" placeholder="" value="{{ optional(old('start'))->format('Y-m-d') }}" required>
                <label for="start">{{ __('Grant date') }}</label>
            </div>
        </div>
        <div class="col-6 d-none" id="endCol">
            <div class="form-floating">
                <input type="date" class="form-control" name="end" id="end" value="{{ optional(old('end'))->format('Y-m-d') }}">
                <label for="end">{{ __('Grant period end') }}</label>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-link btn-sm float-end" id="grant-type-toggle">{{ __('Grant period') }}</button>
</x-modal>

<script>
    const start = document.getElementById('startCol');
    const startLabel = start.getElementsByTagName('label')[0];
    const end = document.getElementById('endCol');
    const button = document.getElementById('grant-type-toggle');

    button.addEventListener('click', () => {
        start.classList.toggle('col-6');
        end.classList.toggle('d-none');
        startLabel.innerText = startLabel.innerText === '{{ __('Grant date') }}' ? '{{ __('Grant period start') }}' : '{{ __('Grant date') }}';
        button.innerText = button.innerText === '{{ __('Grant date') }}' ? '{{ __('Grant period') }}' : '{{ __('Grant date') }}';
    });
</script>
