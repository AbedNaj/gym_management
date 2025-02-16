<x-admin title="{{ __('customers.title')  }}">

    <x-admin.admin-heading
        addRoute="admin.customers.create"
        searchRoute="admin.customers.search"
        inputName="customer">{{ __('customers.AddNewCustomer')  }}
    </x-admin.admin-heading>


    <x-admin.table
        deleteRoute="admin.customers.delete"
        editRoute="admin.customers.edit"
        :columns="[
        'name' => ['name' => __('customers.CustomerName')], 
        'phoneNumber' => ['name' => __('customers.PhoneNumber')], 
   
    ]"
        :datas="$customers"></x-admin.table>

    <div class="mt-2">
        {{ $customers->links() }}
    </div>
    </div>
</x-admin>