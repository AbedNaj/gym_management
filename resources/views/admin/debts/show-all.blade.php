<x-admin title="Customer Debts - {{$CustomerName}}">



    <x-admin.table deleteRoute="admin.registration.delete" editRoute="admin.registration.edit"
        :columns="[
   'debt_date' =>['name'=> 'Debt Date'],
            'customer.name' =>['name'=> 'Customer Name'],
            'debt_amount' =>['name'=> 'Debt Amount'],
            'paid_amount' =>['name'=> 'Paid Amount'],
                    'last_payment_date' =>['name'=> 'Payment Date'],
                            'status' =>['name'=> 'Status'],
                                    
            ]"
        :datas="$debts"
        :delete="false"></x-admin.table>
    <div class="mt-2">
        {{ $debts->links() }}

    </div>

</x-admin>