<x-admin title="{{ __('registration.CustomerRegistrations') }}">



    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
      'customer.name' =>['name'=> __('registration.CustomerName')],
    'start_date' =>['name'=> __('registration.RegistrationDate')],
    'end_date' =>['name'=> __('registration.EndDate')],
    'status' =>['name'=> __('registration.status')],
    ]"
        :datas="$registration"
        :delete="false"></x-admin.table>

    {{ $registration->links() }}
</x-admin>