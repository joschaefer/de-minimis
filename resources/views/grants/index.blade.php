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

    <x-status :status="session('status')" class="mb-3" />

    <table class="table align-middle" id="grants">
        <thead>
        <tr>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Company') }}</th>
            <th>{{ __('Created by') }}</th>
            <th class="text-end">{{ __('Amount') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($grants as $grant)
                <tr data-search-value="{{ mb_strtolower($grant->company->name) }}">
                    <td>
                        {{ $grant->description }}<br>
                        <small class="text-muted">
                            @if($grant->isPeriod())
                                {{ __('Grant period') }}: {{ $grant->start->isoFormat('L') }} – {{ $grant->end->isoFormat('L') }}
                            @else
                                {{ __('Grant date') }}: {{ $grant->start->isoFormat('L') }}
                            @endif
                        </small>
                    </td>
                    <td>
                        <x-badge color="secondary">{{ $grant->category->name }}</x-badge>
                    </td>
                    <td>
                        @can('view', $grant->company)
                            <a href="{{ route('companies.show', $grant->company) }}" class="text-muted">{{ $grant->company->name }}</a>
                        @else
                            {{ $grant->company->name }}
                        @endif
                    </td>
                    <td>
                        {{ $grant->created_by->name }}
                    </td>
                    <td class="text-end">
                        {{ \Illuminate\Support\Str::currency($grant->amount) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-muted"><span id="counter">{{ $grants->count() }}</span> {{ __('grants found') }}.</p>

    @can('create', \App\Models\Grant::class)
        <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeGrantModal">{{ __('Add grant') }}</x-button>
        @include('grants.create')
        <x-button color="outline-success" data-bs-toggle="modal" data-bs-target="#importGrantsModal">{{ __('Import grants') }}</x-button>
        @include('grants.import')
    @endcan
</x-base-layout>
