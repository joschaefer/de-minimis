<x-base-layout>
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Hello, :name.', ['name' => request()->user()->first_name]) }}</h1>
    </header>

    <style>
        .card-cover {
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }

        .card-cover:hover h2 {
            text-decoration: underline;
        }

        .rounded-5 {
            border-radius: 1rem;
        }
    </style>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 mb-5 equal-heights">
        <div class="col">
            <a href="{{ route('companies.index') }}" class="card card-cover h-100 overflow-hidden rounded-5 shadow-lg text-decoration-none" style="background-image: url('{{ asset('companies.jpg') }}');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ __('All companies') }}</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </li>
                        <li class="me-3"><small>{{ __('Active') }}</small></li>
                        <li><small>{{ \App\Models\Company::query()->count() }}</small></li>
                    </ul>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('grants.index') }}" class="card card-cover h-100 overflow-hidden text-white rounded-5 shadow-lg text-decoration-none" style="background-image: url('{{ asset('grants.jpg') }}');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ __('All grants') }}</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </li>
                        <li class="me-3"><small>{{ __('Total') }}</small></li>
                        <li><small>{{ Str::currency(\App\Models\Grant::query()->sum('amount')) }}</small></li>
                    </ul>
                </div>
            </a>
        </div>
    </div>
</x-base-layout>
