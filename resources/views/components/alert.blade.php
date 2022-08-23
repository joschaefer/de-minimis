<div {{ $attributes->class(["alert alert-$color text-start", 'alert-dismissable fade show' => $dismissable])->merge(['role' => 'alert']) }}>
    {{ $slot }}
    @if($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
    @endif
</div>
