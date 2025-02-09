@props(['name' => null, 'label' => null, 'value' => null])

<div class="mb-5">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label ?? $slot }}
    </label>

    <div class="bg-gray-100 border border-gray-300 text-gray-600 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
        {{ $value }}
    </div>
</div>