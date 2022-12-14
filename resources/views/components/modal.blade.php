<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Title" aria-hidden="true" @if(!$dismissible) data-bs-backdrop="static" data-bs-keyboard="false" @endif>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        @isset($action)
            <form class="modal-content" action="{{ $action }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="{{ $id }}Form">
                @csrf
        @else
            <div class="modal-content">
        @endisset
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Title">{{ $title }}</h5>
                @if($dismissible)
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Cancel') }}"></button>
                @endif
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                @isset($action)
                    @if($dismissible)
                        <x-button color="secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</x-button>
                    @endif
                    <x-button color="success" type="submit">{{ $buttonText }}</x-button>
                @else
                    <x-button color="primary" data-bs-dismiss="modal">{{ $buttonText }}</x-button>
                @endisset
            </div>
        @isset($action)
            </form>
        @else
            </div>
        @endisset
    </div>
</div>
