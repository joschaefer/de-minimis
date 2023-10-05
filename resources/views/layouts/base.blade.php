<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<header class="p-3 mb-5 border-bottom bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('home') }}" class="text-dark me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @can('viewAny', \App\Models\Company::class)
                    <li><a href="{{ route('companies.index') }}" class="nav-link px-2 {{ request()->routeIs('companies.*') ? 'link-secondary' : 'link-dark' }}">{{ __('Companies') }}</a></li>
                @endcan
                @can('viewAny', \App\Models\Grant::class)
                    <li><a href="{{ route('grants.index') }}" class="nav-link px-2 {{ request()->routeIs('grants.*') ? 'link-secondary' : 'link-dark' }}">{{ __('Grants') }}</a></li>
                @endcan
                @can('viewAny', \App\Models\Category::class)
                    <li><a href="{{ route('categories.index') }}" class="nav-link px-2 {{ request()->routeIs('categories.*') ? 'link-secondary' : 'link-dark' }}">{{ __('Categories') }}</a></li>
                @endcan
                @can('viewAny', \App\Models\User::class)
                    <li><a href="{{ route('users.index') }}" class="nav-link px-2 {{ request()->routeIs('users.*') ? 'link-secondary' : 'link-dark' }}">{{ __('Users') }}</a></li>
                @endcan
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline m-0">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link px-2 link-dark border-0">{{ __('Logout') }}</button>
                    </form>
                </li>
            </ul>

            {{--@can('viewAny', \App\Models\Company::class)
                <form class="col-12 col-lg-auto mb-3 mb-lg-0" spellcheck="false" autocomplete="off">
                    <input type="search" id="search" class="form-control" placeholder="{{ __('Search') }}..." aria-label="Suche" list="search_suggestions">
                    <datalist id="search_suggestions">
                        @foreach(\App\Models\Company::query()->orderBy('name')->get() as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </datalist>
                </form>
            @endcan--}}
        </div>
    </div>
</header>

<div class="container">
    {{ $slot }}

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <small class="text-muted">© {{ date('Y') }} {{ config('app.copyright') }}</small>
        <small><a href="mailto:mail@johannes-schaefer.de" class="text-muted">{{ __('Support') }}</a></small>
    </footer>
</div>

</body>
</html>
