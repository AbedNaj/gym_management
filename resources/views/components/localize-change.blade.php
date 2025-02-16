@php
$default = [
'class' => 'mx-3'
];
@endphp

<a {{ $attributes->merge(['class' => $attributes->get('class', $default['class'])]) }}
    href="{{ route('lang.change', app()->getLocale() == 'ar' ? 'en' : 'ar') }}">
    {{ __('home.toggle_lang') }}
</a>