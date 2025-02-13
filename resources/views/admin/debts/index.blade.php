<x-admin title="Debt">

    <section class="flex flex-wrap items-center gap-4 md:justify-between">
        <div>
            <div class="mb-4 ">
                <div>
                    @livewire('debt-search')
                </div>

            </div>
        </div>
        <div>
            <x-admin.button href="{{ route('admin.debt.show') }}">
                Add New Debt
            </x-admin.button>
        </div>
    </section>
    <x-admin.table

        :delete="false"
        deleteRoute="admin.debt.delete"
        editRoute="admin.debt.edit"
        :columns="[
            'debt_date' =>['name'=> 'Debt Date'],
            'customer.name' =>['name'=> 'Customer Name'],
            'debt_amount' =>['name'=> 'Debt Amount'],
            'paid_amount' =>['name'=> 'Paid Amount'],
                    'last_payment_date' =>['name'=> 'Payment Date'],
                            'status' =>['name'=> 'Status'],
                                    
            ]"
        :datas="$debts" />


    <div class="mt-2">

        {{ $debts->links() }}
    </div>
</x-admin>