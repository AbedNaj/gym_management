@props(['columns' => [], 'datas' => [],'editRoute' , 'deleteRoute'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-full mx-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-2 md:p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>

                @foreach ($columns as $column)
                <th scope="col" class="px-2 py-3 md:px-4 md:py-3">{{ $column['name'] }}</th>
                @endforeach

                <th scope="col" class="px-2 py-3 md:px-4 md:py-3">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-2 md:p-4">
                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                </td>

                @foreach ($columns as $key => $column)
                <td class="px-2 py-4 md:px-4 md:py-4">
                    {{ $data[$key] ?? '—' }}
                </td>
                @endforeach


                <td class="px-2 py-4 md:px-4 md:py-4 flex items-center space-x-2 md:space-x-4">
                    <a href="{{ route($editRoute, $data['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">edit</a>
                    <x-form.form method="post" action="{{ route($deleteRoute, $data['id']) }}" class="inline">
                        @method('DELETE')
                        <x-form.button class="font-medium text-red-500 hover:text-red-600">
                            delete
                        </x-form.button>
                    </x-form.form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>