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
    </header>

    <x-status :status="session('status')" class="mb-3" />
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
                <a href="{{ route('contacts.show', $contact) }}" class="text-muted">{{ $contact->name }}</a><br>
            @endforeach
        </dd>
    </dl>

    <h3 class="mt-5 mb-3">{{ __('Grants') }}</h3>

    <table class="table align-middle" id="grants">
        <thead>
        <tr>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Created by') }}</th>
            <th class="text-end">{{ __('Amount') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($company->grants as $grant)
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
                        {{ $grant->created_by->name }}
                    </td>
                    <td class="text-end">
                        {{ \Illuminate\Support\Str::currency($grant->amount) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light">
                <th colspan="3">{{ __('Sum') }}:</th>
                <td class="text-end">{{ \Illuminate\Support\Str::currency($company->grants->sum('amount')) }}</td>
            </tr>
        </tfoot>
    </table>
</x-base-layout>
