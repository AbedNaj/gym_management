<x-admin title="{{ __('payment.title') }}">




    <x-admin.customer-search
        SearchRoute="admin.payment.search"
        ResetRoute="admin.payment.index" />



    <x-admin.table
        detailsRoute="admin.payment.show"
        :columns="[
            'customer.name' => ['name' => __('registration.CustomerName')],
            'payment_date' => ['name' => __('payment.paymentDate')],
            'amount' => ['name' => __('payment.amount')],
        ]"
        :delete="false"
        :details="true"
        :edit="false"
        :datas="$payments"></x-admin.table>


    <div class="mt-2">
        {{ $payments->appends(request()->query())->links() }}
    </div>
</x-admin>