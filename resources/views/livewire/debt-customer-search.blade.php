<div class="relative">

    <label for='name' class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('debts.CustomerName') }}</label>
    <input name="name" type="" wire:keydown.enter.prevent="selectCustomer"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model.live="query" wire:keydown.escape="fresh" wire:keydown.tab="fresh"
        wire:keydown.arrow-up='decrementHighLight' wire:keydown.arrow-down='incrementHighLight'
        placeholder="*" autocomplete="off">

    <div wire:loading class="absolute z-10 w-full bg-white shadow-lg rounded-b-lg max-h-60 overflow-auto">
        <div class="list-item">{{ __('debts.Searching') }}</div>
    </div>
    @if(!empty($customers) && !empty($query))
    <div class="fixed top-0 right-0 bottom-0 left-0" wire:click='fresh'></div>
    <div class="absolute z-10 w-full bg-white shadow-lg rounded-b-lg max-h-60 overflow-auto">
        @foreach($customers as $i => $customer)
        <div class="p-2  cursor-pointer border-b border-gray-100  text-black text-white:dark {{ $highlightindex == $i ? 'bg-blue-500  text-white' : '' }}"
            wire:mouseover="setHighlightIndex({{ $i }})" wire:click="selectCustomerByIndex({{ $i }})">

            @isset($customer['name'])
            {{ $customer['name'] }}
            @else
            <span class="text-gray-400">Unnamed customer</span>
            @endisset
        </div>
        @endforeach

    </div>
    @elseif($query !== '' && $customers == [])
    <div class="absolute z-10 w-full bg-white shadow-lg rounded-b-lg">
        <div class="p-2 text-gray-500">
            {{ __('debts.NoResults') }}
        </div>
        @endif
    </div>