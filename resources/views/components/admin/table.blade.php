@props(['columns' => [], 'datas' => [],'editRoute' , 'deleteRoute' , 'delete' =>true ])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-full mx-auto">

    <div class="block md:hidden">
        @foreach ($datas as $data)
        <div class="mb-4 bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="p-4 border-b dark:border-gray-700">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 mr-3">

                        <span class="font-medium text-gray-900 dark:text-white">
                            {{ data_get($data, array_key_first($columns)) }}
                        </span>
                    </div>

                    @if (isset($columns['status']))
                    <span @class([ 'text-xs font-medium uppercase rounded-md py-1 px-2' , 'bg-green-200 text-green-900 border border-green-500'=> $data['status'] === __('registration.active'),
                        'bg-red-200 text-red-900 border border-red-500' => $data['status'] === __('registration.expired'),
                        'bg-orange-200 text-orange-900 border border-orange-500' => $data['status'] === __('registration.suspended'),
                        'bg-gray-200 text-gray-900 border border-gray-400' => $data['status'] === __('registration.canceled'),
                        'bg-yellow-200 text-yellow-900 border border-yellow-500' => $data['status'] === __('registration.pending'),
                        'bg-green-200 text-green-800 border border-green-500' => $data['status'] === __('registration.paid'),
                        'bg-red-200 text-red-800 border border-red-500' => $data['status'] === __('registration.unpaid'),
                        'bg-blue-200 text-blue-900 border border-blue-500' => $data['status'] === __('registration.freezed'),
                        ])>
                        {{ ucfirst($data['status']) }}
                    </span>
                    @endif
                </div>


                @foreach ($columns as $key => $column)
                @if ($key !== array_key_first($columns) && $key !== 'status')
                <div class="py-2 flex justify-between">
                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $column['name'] }}:</span>
                    <span class="text-sm text-gray-900 dark:text-gray-300">{{ data_get($data, $key) ?? '—' }}</span>
                </div>
                @endif
                @endforeach
            </div>


            <div class="px-4 py-3 flex justify-end gap-3 bg-gray-50 dark:bg-gray-700">
                <a href="{{ route($editRoute, $data['id']) }}"
                    class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    {{ __('table.edit') }}
                </a>
                @if ($delete==true)
                <x-form.form method="post" action="{{ route($deleteRoute, $data['id']) }}" class="inline">
                    @method('DELETE')
                    <x-form.button class="text-sm font-medium text-red-500 hover:text-red-600">
                        {{ __('table.delete') }}
                    </x-form.button>
                </x-form.form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <table class="hidden md:table w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center justify-center">
                        <input id="checkbox-all-search" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>

                @foreach ($columns as $column)
                <th scope="col" class="px-4 py-3">{{ $column['name'] }}</th>
                @endforeach

                <th scope="col" class="px-4 py-3">{{ __('table.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center justify-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                </td>

                @foreach ($columns as $key => $column)
                <td class="px-4 py-4">
                    @if ($key === 'status')
                    <span @class([ 'block w-full text-xs font-medium uppercase rounded-md py-1 text-center' , 'bg-green-200 text-green-900 border border-green-500'=> $data['status'] === __('registration.active'),
                        'bg-red-200 text-red-900 border border-red-500' => $data['status'] === __('registration.expired'),
                        'bg-orange-200 text-orange-900 border border-orange-500' => $data['status'] === __('registration.suspended'),
                        'bg-gray-200 text-gray-900 border border-gray-400' => $data['status'] === __('registration.canceled'),
                        'bg-yellow-200 text-yellow-900 border border-yellow-500' => $data['status'] === __('registration.pending'),
                        'bg-green-200 text-green-800 border border-green-500' => $data['status'] === __('registration.paid'),
                        'bg-red-200 text-red-800 border border-red-500' => $data['status'] === __('registration.unpaid'),
                        'bg-blue-200 text-blue-900 border border-blue-500' => $data['status'] === __('registration.freezed'),
                        ])>
                        {{ ucfirst($data['status']) }}
                    </span>
                    @else
                    {{ data_get($data, $key) ?? '—' }}
                    @endif
                </td>
                @endforeach

                <td class="px-4 py-4 whitespace-nowrap">
                    <div class="flex justify-center gap-x-4">
                        <a href="{{ route($editRoute, $data['id']) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            {{ __('table.edit') }}
                        </a>

                        @if ($delete==true)
                        <x-form.form method="post" action="{{ route($deleteRoute, $data['id']) }}" class="inline">
                            @method('DELETE')
                            <x-form.button class="font-medium text-red-500 hover:text-red-600">
                                {{ __('table.delete') }}
                            </x-form.button>
                        </x-form.form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>