<x-base-layout>
    <header class="mb-5 d-flex align-items-center gap-2">
        <h1 class="display-5">{{ $company->name }}</h1>
        @can('update', $company)
            <a href="{{ route('companies.edit', $company) }}" title="{{ __('Edit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
            </a>
        @endcan
        @can('delete', $company)
            <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0" title="Löschen" data-confirm="{{ __('Are you sure you want to delete this company?') }}" data-bs-toggle="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </form>
        @endcan
    </header>

    <x-status :status="session('success')" class="mb-3" />
    <x-errors :errors="$errors" class="mb-3" />

    <dl class="row">
        <dt class="col-sm-2">{{ __('Name') }}:</dt>
        <dd class="col-sm-10">{{ $company->name }}</dd>

        <dt class="col-sm-2">{{ __('Founded at') }}:</dt>
        <dd class="col-sm-10">{{ optional($company->founded_at)->isoFormat('L') ?? '–' }}</dd>

        <dt class="col-sm-2">{{ __('Register court') }}:</dt>
        <dd class="col-sm-10">{{ $company->register_court ?? '–' }}</dd>

        <dt class="col-sm-2">{{ __('Register number') }}:</dt>
        <dd class="col-sm-10">{{ $company->register_number ?? '–' }}</dd>

        <dt class="col-sm-2">{{ __('Contacts') }}:</dt>
        <dd class="col-sm-10">
            @foreach($company->contacts as $contact)
                <a href="mailto:{{ $contact->email }}" class="text-muted">{{ $contact->name }}</a><br>
            @endforeach
        </dd>

        <dt class="col-sm-2">{{ __('Report') }}:</dt>
        <dd class="col-sm-10">
            <a href="{{ $company->report }}" class="btn btn-outline-secondary btn-sm">{{ __('Send report') }}</a>
        </dd>
    </dl>

    <h3 class="mt-5 mb-3">{{ __('Grants') }}</h3>

    @if($company->grants->isEmpty())
        <p class="text-muted">{{ __('No grants yet.') }}</p>
    @else
        @include('grants.table', ['grants' => $company->grants, 'showCompany' => false, 'showSum' => true])
    @endif

    @can('create', \App\Models\Grant::class)
        <x-button color="success" data-bs-toggle="modal" data-bs-target="#storeGrantModal">{{ __('Add grant') }}</x-button>
        @include('grants.create', ['company' => $company])
        <x-button color="outline-success" data-bs-toggle="modal" data-bs-target="#importGrantsModal">{{ __('Import grants') }}</x-button>
        @include('grants.import', ['company' => $company])
    @endcan
</x-base-layout>
