@props(['svg' , 'active' =>'false'])

@php
$style = 'flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 ';
if ($active === true)
$style .= ' bg-gray-100 dark:bg-gray-700'

@endphp
<a {{ $attributes->merge(['class' => $style]) }}>
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{$svg}}" />
    </svg>
    <span class="mx-3">{{ $slot }}</span>
</a>