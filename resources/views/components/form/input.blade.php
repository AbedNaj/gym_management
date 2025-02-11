@props(['name' =>null , 'label'=>'null' , 'placeholder' => null])
@php
$defaults = [
'type' => 'text',
'id' => $name,
'name' => $name,
'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
'value' => old($name),
'placeholder' => $placeholder
];
@endphp

<div class="mb-5">
    <label for={{ $name }} class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$slot}}</label>

    <input {{$attributes($defaults)}} />

    <p class="text-sm text-red-500 mt-1">{{$errors->first($name) }}</p>

</div>