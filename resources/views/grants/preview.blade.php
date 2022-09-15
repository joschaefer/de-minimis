<x-slim-layout>
    <div class="mb-5">
        <h1>{{ __('De-minimis report') }}</h1>
        <h2 class="text-muted">{{ $company->name }}</h2>
    </div>

    <table class="table align-middle" id="grants">
        <thead>
        <tr>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Category') }}</th>
            <th class="text-end">{{ __('Amount') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($company->grants as $grant)
                <tr>
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
                    <td class="text-end">
                        {{ \Illuminate\Support\Str::currency($grant->amount) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-muted"><span id="counter">{{ $company->grants->count() }}</span> {{ __('grants found') }} ({{ __('As of') }}: {{ now()->isoFormat('L') }}).</p>

    <x-alert color="warning" class="d-flex align-items-center d-print-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
        </svg>
        <div>{!! __('If you have any questions, please contact <a href="mailto::email" class="alert-link">:email</a>.', ['email' => config('app.email')]) !!}</div>
    </x-alert>
</x-slim-layout>
