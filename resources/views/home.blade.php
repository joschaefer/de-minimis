<x-base-layout>
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1>{{ __('Hi, :name.', ['name' => request()->user()->first_name]) }}</h1>
    </header>
</x-base-layout>
