<x-base-layout>
    <form action="{{ route('grants.update', $grant) }}" method="POST" accept-charset="UTF-8" autocomplete="off" autocapitalize="off">
        @csrf
        @method('PUT')

        <header class="d-flex justify-content-between align-items-center mb-5">
            <h1>{{ __('Edit grant')  }}</h1>
        </header>

        <x-status :status="session('success')" class="mb-3" />
        <x-errors :errors="$errors" class="mb-3" />

        <div class="form-floating mb-3">
            <select name="company_id" class="form-select" aria-label="{{ __('Company') }}" disabled>
                <option value="{{ $grant->company->id }}" selected>{{ $grant->company->name }}</option>
            </select>
            <label>{{ __('Company') }}</label>
        </div>
        <div class="form-floating mb-3">
            <select name="category_id" class="form-select" aria-label="{{ __('Category') }}" required>
                <option value="" disabled hidden @if(is_null($grant->category) || $grant->category->trashed()) selected @endif>{{ __('Please select') }}</option>
                @foreach(\App\Models\Category::query()->orderBy('name')->get() as $category)
                    <option value="{{ $category->id }}" @if(old('category_id', $grant->category_id) === $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <label>{{ __('Category') }}</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="description" id="description" placeholder="{{ __('Description') }}" value="{{ old('description', $grant->description) }}" required>
            <label for="description">{{ __('Description') }}</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="amount" id="amount" placeholder="{{ __('Amount') }}" value="{{ old('amount', $grant->amount) }}" step=".01" min="0" required>
            <label for="amount">{{ __('Amount') }}</label>
        </div>
        <div class="row">
            <div class="col" id="startCol">
                <div class="form-floating">
                    <input type="date" class="form-control" name="start" id="start" placeholder="" value="{{ optional(old('start', $grant->start))->format('Y-m-d') }}" required>
                    <label for="start">{{ __('Grant date') }}</label>
                </div>
            </div>
            <div class="col-6 d-none" id="endCol">
                <div class="form-floating">
                    <input type="date" class="form-control" name="end" id="end" value="{{ optional(old('end', $grant->end))->format('Y-m-d') }}">
                    <label for="end">{{ __('Grant period end') }}</label>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-link btn-sm float-end" id="grant-type-toggle">{{ __('Grant period') }}</button>

        <div class="mt-4">
            <x-button color="success" type="submit">{{ __('Save') }}</x-button>
            <a href="{{ route('grants.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
        </div>
    </form>

    <script>
        const start = document.getElementById('startCol');
        const startLabel = start.getElementsByTagName('label')[0];
        const end = document.getElementById('endCol');
        const button = document.getElementById('grant-type-toggle');

        const toggle = () => {
            start.classList.toggle('col-6');
            end.classList.toggle('d-none');
            startLabel.innerText = startLabel.innerText === '{{ __('Grant date') }}' ? '{{ __('Grant period start') }}' : '{{ __('Grant date') }}';
            button.innerText = button.innerText === '{{ __('Grant date') }}' ? '{{ __('Grant period') }}' : '{{ __('Grant date') }}';
        }

        button.addEventListener('click', () => {
            toggle();
        });

        if (document.getElementById('end').value) {
            toggle();
        }
    </script>
</x-base-layout>
