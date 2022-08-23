<x-base-layout>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Companies') }}</h1>
        @can('create', \App\Models\Company::class)
            <div class="d-flex align-items-center gap-2">
                <input type="search" id="search" class="form-control" placeholder="{{ __('Search') }}..." autocomplete="off" autocapitalize="off" aria-label="{{ __('Search company') }}">
                <x-button color="success" class="flex-shrink-0" data-bs-toggle="modal" data-bs-target="#storeCompanyModal">{{ __('Add company') }}</x-button>
                {{--<x-button color="secondary" class="flex-shrink-0" data-bs-toggle="modal" data-bs-target="#importCompanyModal">{{ __('Import company') }}</x-button>--}}
            </div>
        @endcan
    </div>

    <x-status :status="session('status')" class="mb-3" />

    <table class="table align-middle" id="companies">
        <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Contacts') }}</th>
            <th class="text-end">{{ __('Total grants') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr data-search-value="{{ mb_strtolower($company->name) }}">
                    <td>
                        @can('view', $company)
                            <a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a>
                        @else
                            {{ $company->name }}
                        @endif
                    </td>
                    <td>
                        @foreach($company->contacts as $contact)
                            <a href="{{ route('contacts.show', $contact) }}" class="text-muted">{{ $contact->name }}</a><br>
                        @endforeach
                    </td>
                    <td class="text-end">
                        {{ \Illuminate\Support\Str::currency($company->grants()->sum('amount')) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-muted"><span id="counter">{{ $companies->count() }}</span> {{ __('companies found') }}.</p>

    @can('create', \App\Models\Company::class)
        <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeCompanyModal">{{ __('Add company') }}</x-button>

        <x-modal id="storeCompanyModal" action="{{ route('companies.store') }}" title="{{ __('Add company') }}">
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('e.g. Example Company GmbH') }}" maxlength="255" value="" autocomplete="off" autocapitalize="off" required>
                    <label for="name">{{ __('Name') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email" placeholder="z.B. info@musterfirma.com" maxlength="100" value="" autocomplete="off" required>
                        <label for="email">E-Mail-Adresse</label>
                    </div>
                </div>
            </div>
        </x-modal>

        <x-modal id="importCompanyModal" action="{{ route('companies.store') }}" title="{{ __('Import company') }}">
            {{-- TODO --}}
        </x-modal>
    @endcan

    <script>
        const list = document.getElementById('companies');
        const counter = document.getElementById('counter');

        document.querySelectorAll('#search').forEach((elem) => elem.addEventListener('input', (e) => {
            let query = e.target.value.toLowerCase();
            let i = 0;
            list.querySelectorAll('tbody tr').forEach((item) => {
                if (item.dataset.searchValue.indexOf(query) > -1) {
                    item.classList.remove('d-none');
                    i++;
                } else {
                    item.classList.add('d-none');
                }
            })
            counter.innerText = i.toString();
        }));
    </script>
</x-base-layout>
