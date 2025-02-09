<form {{ $attributes->merge(['method' => 'GET'])->class($attributes->has('class') ? '' : 'max-w-sm mx-auto') }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif
    {{ $slot }}
</form>