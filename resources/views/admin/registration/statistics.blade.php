<x-admin title="{{ __('registration.statistics') }}">

    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
      'customer.name' =>['name'=> __('registration.CustomerName')],
    'start_date' =>['name'=>  __('registration.RegistrationDate')],
    'end_date' =>['name'=> __('registration.EndDate')],
    'status' =>['name'=> __('registration.status')],
    ]"
        :delete="false"
        :datas="$datas"></x-admin.table>


    <div class="mt-2">

        {{ $datas->links() }}
    </div>

</x-admin>