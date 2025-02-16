<x-admin title="{{ __('debts.title') }}">

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
                {{ __('debts.addNew') }}
            </x-admin.button>
        </div>
    </section>
    <x-admin.table

        :delete="false"
        deleteRoute="admin.debt.delete"
        editRoute="admin.debt.edit"
        :columns="[
                   'customer.name' =>['name'=> __('debts.CustomerName')],
            'debt_date' =>['name'=>  __('debts.DebtDate')],
     
            'debt_amount' =>['name'=> __('debts.DebtAmount')],
            'paid_amount' =>['name'=> __('debts.paidAmount')],
                    'last_payment_date' =>['name'=> __('debts.PaymentDate')],
                            'status' =>['name'=> __('debts.status')],
                                    
            ]"
        :datas="$debts" />


    <div class="mt-2">

        {{ $debts->links() }}
    </div>
</x-admin>