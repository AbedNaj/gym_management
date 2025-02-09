@props(['name'])
<p class="text-sm text-red-500 mt-1">{{$errors->first($name) }}</p>