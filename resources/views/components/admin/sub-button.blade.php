@props(['icon'=>'M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18'])
<section class="mb-6">
    <a {{ $attributes }} class="inline-flex items-center px-4 py-2 dark:bg-indigo-600
     bg-admin-button border border-transparent rounded-md font-semibold text-xs
      text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700
       active:bg-indigo-900 focus:outline-none focus:ring-2
     focus:ring-indigo-500 focus:ring-offset-2 transition-all ease-in-out duration-150
      dark:focus:ring-offset-gray-800">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{$icon}}" />
        </svg>
        {{ $slot }}
    </a>
</section>