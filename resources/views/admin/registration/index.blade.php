<x-admin title="{{ __('registration.title') }}">


    <section class="flex flex-wrap items-center gap-4 md:justify-between">
        <div>
            <div>
                <div>
                    @livewire('registration-search')
                </div>

            </div>
        </div>
        <div class="flex">
            <div class="mx-1">

                <x-admin.button
                    href="{{ route('admin.freeze.index') }}"
                    icon="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z">
                    {{ __('registration.showAllFreezes') }}
                    </x-admin.sub-button>
            </div>
            <x-admin.button href="{{ route('admin.registration.show') }}">
                {{ __('registration.addNew') }}
            </x-admin.button>

        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="" />
    </svg>



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