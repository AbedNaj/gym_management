<x-admin title="{{  __('debts.customerDebts')}} - {{$CustomerName}}">



    <x-admin.table deleteRoute="admin.debt.delete" editRoute="admin.debt.edit"
        :columns="[
   'debt_date' =>['name'=> __('debts.DebtDate')],
            'customer.name' =>['name'=>  __('debts.CustomerName')],
            'debt_amount' =>['name'=> __('debts.DebtAmount')],
            'paid_amount' =>['name'=> __('debts.paidAmount')],
                    'last_payment_date' =>['name'=> __('debts.PaymentDate')],
                            'status' =>['name'=> __('debts.status')],
                                    
            ]"
        :datas="$debts"
        :delete="false"></x-admin.table>
    <div class="mt-2">
        {{ $debts->links() }}

    </div>

</x-admin>