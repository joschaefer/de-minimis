@if($errors->any())
    <x-alert color="danger">
        @if($errors->count() === 1)
            {{ $errors->first() }}
        @else
            {{ __('Multiple errors occured:') }}
            <ul class="mt-1 mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </x-alert>
@endif
