<table class="table align-middle" id="grants">
    <thead>
    <tr>
        <th>{{ __('Description') }}</th>
        <th>{{ __('Category') }}</th>
        @if($showCompany ?? true)
        <th>{{ __('Company') }}</th>
        @endif
        <th>{{ __('Created by') }}</th>
        <th class="text-end">{{ __('Amount') }}</th>
        <th></th>
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
                @if($grant->category)
                    <x-badge color="{{ $grant->category->trashed() ? 'warning' : 'secondary' }}">{{ $grant->category->name }}</x-badge>
                @endif
            </td>
            @if($showCompany ?? true)
            <td>
                @can('view', $grant->company)
                    <a href="{{ route('companies.show', $grant->company) }}" class="text-muted">{{ $grant->company->name }}</a>
                @else
                    {{ $grant->company->name }}
                @endif
            </td>
            @endif
            <td>
                {{ $grant->created_by->name }}
            </td>
            <td>
                {{ \Illuminate\Support\Str::currency($grant->amount) }}
            </td>
            <td class="text-end text-nowrap">
                @can('update', $grant)
                    <a href="{{ route('grants.edit', $grant) }}" class="btn btn-link p-0" title="{{ __('Edit') }}" data-bs-toggle="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                @endcan
                @can('delete', $grant)
                    <form action="{{ route('grants.destroy', $grant) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0" title="Löschen" data-confirm="{{ __('Are you sure you want to delete this user?') }}" data-bs-toggle="tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
    </tbody>
    @if($showSum ?? false)
        <tfoot>
            <tr class="bg-light">
                <th colspan="3">{{ __('Sum') }}:</th>
                <td class="text-end">{{ \Illuminate\Support\Str::currency($grants->sum('amount')) }}</td>
                <td></td>
            </tr>
        </tfoot>
    @endif
</table>

<p class="text-muted"><span id="counter">{{ $grants->count() }}</span> {{ __('grants found') }}.</p>
