@props(['color' =>'blue' , 'title' => 'title' , 'route' =>'admin.dashboard' ])

<div class="bg-white relative  dark:bg-gray-700 px-4 pt-4 pb-2 rounded-lg shadow-sm hover:shadow-lg transition-shadow">


    <h3 class="text-gray-500 dark:text-gray-300 font-bold text-sm mb-2">{{ $title }}</h3>
    <p class="text-2xl font-bold text-{{ $color }}-600 dark:text-{{ $color }}-400">{{ $slot }}</p>


    @if ($route !== 'admin.dashboard')


    <a class="flex justify-between hover:bg-gray-50 dark:hover:bg-gray-700 mt-4 
    text-{{ $color }}-600 dark:text-{{ $color }}-400 " href="{{ route($route) }}">
        {{ __('dashboard.more') }}

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
        </svg>

    </a>


    @endif
</div>