<x-admin title="Customers">

    <x-admin.admin-heading
        addRoute="admin.customers.create"
        searchRoute="admin.customers.search"
        inputName="customer">Add New Customer
    </x-admin.admin-heading>


    <x-admin.table
        deleteRoute="admin.customers.delete"
        editRoute="admin.customers.edit"
        :columns="[
        'name' => ['name' => 'Customer Name'], 
        'phoneNumber' => ['name' => 'Phone Number'], 
   
    ]"
        :datas="$customers"></x-admin.table>

    <div class="mt-2">
        {{ $customers->links() }}
    </div>
    </div>
</x-admin>