<x-base-layout>
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Grants') }}</h1>
        @can('create', \App\Models\Grant::class)
            <div class="d-flex align-items-center gap-2">
                <input type="search" data-search="grants" class="form-control" placeholder="{{ __('Search') }}..." autocomplete="off" autocapitalize="off" aria-label="{{ __('Search company') }}">
                <x-button color="success" class="flex-shrink-0" data-bs-toggle="modal" data-bs-target="#storeGrantModal">{{ __('Add grant') }}</x-button>
            </div>
        @endcan
    </div>

    <x-status :status="session('success')" class="mb-3" />

    @include('grants.table')

    @can('create', \App\Models\Grant::class)
        <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeGrantModal">{{ __('Add grant') }}</x-button>
        @include('grants.create')
        <x-button color="outline-success" data-bs-toggle="modal" data-bs-target="#importGrantsModal">{{ __('Import grants') }}</x-button>
        @include('grants.import')
    @endcan
</x-base-layout>
