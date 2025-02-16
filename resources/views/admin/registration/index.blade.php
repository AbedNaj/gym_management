<x-admin title="{{ __('registration.title') }}">


    <section class="flex flex-wrap items-center gap-4 md:justify-between">
        <div>
            <div class="mb-4 ">
                <div>
                    @livewire('registration-search')
                </div>

            </div>
        </div>
        <div>
            <x-admin.button href="{{ route('admin.registration.show') }}">
                {{ __('registration.addNew') }}
            </x-admin.button>
        </div>
    </section>




    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
      'customer.name' =>['name'=> __('registration.CustomerName')],
    'start_date' =>['name'=> __('registration.RegistrationDate')],
    'end_date' =>['name'=> __('registration.EndDate')],
    'status' =>['name'=> __('registration.status')],
    ]"
        :delete="false"
        :datas="$registration"></x-admin.table>

    <div class="mt-2">

        {{ $registration->appends(request()->query())->links() }}
    </div>
    </div>
</x-admin>