<x-admin title="Customers">


    <section class="flex flex-wrap items-center gap-4 md:justify-between">

        <div>
            <x-form.form action="{{route('admin.customers.search' )}}">
                <x-form.input class="max-w-48 w-full sm:w-auto" placeholder="Search" name="customer"></x-form.input>
            </x-form.form>
        </div>
        <div>

            <x-admin.button href="{{route('admin.customers.create')}}">
                Add New Customer
            </x-admin.button>
        </div>
    </section>

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
                    <th scope="col" class="px-2 py-3 md:px-4 md:py-3">Customer name</th>
                    <th scope="col" class="px-2 py-3 md:px-4 md:py-3">Phone Number</th>
                    <th scope="col" class="px-2 py-3 md:px-4 md:py-3">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-2 md:p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-2 py-4 md:px-4 md:py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $customer['name'] }}
                    </th>
                    <td class="px-2 py-4 md:px-4 md:py-4">{{ $customer['phoneNumber'] }}</td>
                    <td class="px-2 py-4 md:px-4 md:py-4 flex items-center space-x-2 md:space-x-4">
                        <a href="{{route('admin.customers.edit',$customer['id'])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <x-form.form method="post" action="{{route('admin.customers.delete',$customer['id'])}}" class="inline">
                            @method('DELETE')
                            <x-form.button class="font-medium text-red-500 hover:text-red-600">
                                Delete
                            </x-form.button>
                        </x-form.form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </table>


        <div class="mt-2">
            {{ $customers->links() }}
        </div>
    </div>
</x-admin>