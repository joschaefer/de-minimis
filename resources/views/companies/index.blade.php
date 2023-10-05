<x-base-layout>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Companies') }}</h1>
        @can('create', \App\Models\Company::class)
            <div class="d-flex align-items-center gap-2">
                <input type="search" data-search="companies" class="form-control" placeholder="{{ __('Search') }}..." autocomplete="off" autocapitalize="off" aria-label="{{ __('Search company') }}">
                <x-button color="success" class="flex-shrink-0" data-bs-toggle="modal" data-bs-target="#storeCompanyModal">{{ __('Add company') }}</x-button>
                {{--<x-button color="secondary" class="flex-shrink-0" data-bs-toggle="modal" data-bs-target="#importCompanyModal">{{ __('Import company') }}</x-button>--}}
            </div>
        @endcan
    </div>

    <x-status :status="session('success')" class="mb-3" />

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
                            <a href="mailto:{{ $contact->email }}" class="text-muted">{{ $contact->name }}</a><br>
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
        @include('companies.create')

        <x-modal id="importCompanyModal" action="{{ route('companies.store') }}" title="{{ __('Import company') }}">
            {{-- TODO --}}
        </x-modal>
    @endcan
</x-base-layout>
