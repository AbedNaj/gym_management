@props(['ResetRoute' => 'admin.dashboard' , 'SearchRoute' => 'admin.dashboard'])
<div x-data="{
        query: '',
        results: { customers: [] },
        isLoading: false,
        isOpen: false,
        
        resetSearch() {
            this.query = '';
            this.results = { customers: [] };
            this.isOpen = false;
        },
        
        async search() {
            if (this.query.length < 2) {
                this.results = { customers: [] };
                this.isOpen = false;
                return;
            }
            
            this.isLoading = true;
            this.isOpen = true;
            
            try {
                const url = new URL(@js(route('admin.customers.search.all')));
                url.searchParams.set('query', this.query);
                const response = await fetch(url);
                this.results = await response.json();
            } catch (error) {
                console.error('Search failed:', error);
                this.results = { customers: [] };
            }
            
            this.isLoading = false;
        }
    }" class="relative mb-4  w-full max-w-40">
    <div class="relative">
        <input
            type="text"
            x-model="query"
            @input.debounce.300ms="search()"
            @focus="isOpen = true"
            placeholder="{{ __('customers.Search') }}"
            class="w-full p-2 border rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-700 transition-colors duration-200 sm:text-sm">
    </div>

    <div
        x-show="isOpen && query.length >= 2"
        x-transition.opacity
        @click.away="isOpen = false"
        class="absolute z-50 mt-1 w-full rounded-md border bg-white shadow-lg dark:bg-gray-800 dark:border-gray-700">
        <div x-show="isLoading" class="p-2 text-gray-500 dark:text-gray-400">
            {{ __('customers.Searching') }}
        </div>

        <template x-if="!isLoading && results.customers?.length">
            <div class="py-2">
                <template x-for="customer in results.customers" :key="customer.id">
                    <a :href="'{{ route($SearchRoute) }}?customer=' + customer.id"
                        class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 transition-colors duration-200"
                        x-text="customer.name">
                    </a>
                </template>
            </div>
        </template>

        <div
            x-show="!isLoading && results.customers?.length === 0 && query.length >= 2"
            class="p-2 text-gray-500 dark:text-gray-400">
            {{ __('customers.NoResults') }}
        </div>
    </div>

    @if(request()->has('customer'))
    <div class="mt-2">
        <a
            href="{{ route($ResetRoute) }}"
            class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200 text-sm">
            &times; {{ __('customers.reset') }}
        </a>
    </div>
    @endif
</div>