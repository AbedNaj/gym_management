@props([
    'addRoute' => null,
    'searchRoute' => null,
    'inputName' => 'null',
    'addParam' => null
])

<section class="flex flex-wrap items-center gap-4 md:justify-between">
    <div>
        <x-form.form action="{{ route($searchRoute, null) }}">
            <x-form.input class="max-w-48 w-full sm:w-auto" placeholder="Search" name="{{ $inputName }}"></x-form.input>
        </x-form.form>
    </div>
    <div>
        <x-admin.button href="{{ route($addRoute) }}">
            {{ $slot }}
        </x-admin.button>
    </div>
</section>