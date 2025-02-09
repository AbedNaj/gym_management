@props(['name', 'options' => [], 'defaultValue' => 'Select a value'])

<label for="{{ $name }}" class="block text-sm font-medium text-gray-900 dark:text-white">
    {{ $slot }}
</label>

<select name="{{ $name }}"
    {{ $attributes->merge(['class' => 'bg-gray-50 border mb-0 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}>

    <option value="">{{ $defaultValue }}</option>

    @foreach ($options as $value => $label)
    <option value="{{ $value }}">{{ $label }}</option>
    @endforeach

</select>

<p class="text-sm text-red-500 mt-1 mb-0">{{ $errors->first($name) }}</p>