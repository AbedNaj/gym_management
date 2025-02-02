<form {{ $attributes(["class"=> "max-w-sm mx-auto" , "method"=>"GET"]) }}>
    @if ($attributes->get('method', 'GET') !== 'GET')
    @csrf
    @method($attributes->get('method'))
    @endif
    {{ $slot }}
</form>