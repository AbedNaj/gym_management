<x-admin title="Customer Registrations">



    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
      'customer.name' =>['name'=> 'Customer Nmae'],
    'start_date' =>['name'=> 'Registration Date'],
    'end_date' =>['name'=> 'End Date'],
    'status' =>['name'=> 'status'],
    ]"
        :datas="$registration"
        :delete="false"></x-admin.table>

    {{ $registration->links() }}
</x-admin>