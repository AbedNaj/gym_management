<x-admin title="{{ __('freeze.title') }}">





    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.freeze.show"
        :columns="[
      'registration.customer.name' =>['name'=> __('registration.CustomerName')],
    'freeze_start_date' =>['name'=> __('freeze.freezeStartDate')],
        'freeze_end_date' => ['name'=> __('freeze.freeze_end_date')],
    'freeze_duration' =>['name'=> __('freeze.freezeDuration')],

    'status' =>['name'=> __('freeze.status')],
    ]"
        :delete="false"
        :datas="$freeze"></x-admin.table>

    <div class="mt-2">

        {{ $freeze->appends(request()->query())->links() }}
    </div>
    </div>
</x-admin>