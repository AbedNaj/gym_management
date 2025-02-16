<x-admin>


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
        :datas="$datas" />


    <div class="mt-2">

        {{ $datas->links() }}
    </div>
</x-admin>