<x-admin title="Registration">


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
                Add New Registration
            </x-admin.button>
        </div>
    </section>




    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
      'customer.name' =>['name'=> 'Customer Nmae'],
    'start_date' =>['name'=> 'Registration Date'],
    'end_date' =>['name'=> 'End Date'],
    'status' =>['name'=> 'status'],
    ]"
        :delete="false"
        :datas="$registration"></x-admin.table>

    <div class="mt-2">

        {{ $registration->links() }}
    </div>
    </div>
</x-admin>