<x-admin title="{{ __('debts.addNew') }}">


    <x-form.form method="POST" action="{{ route('admin.debt.store' , $customerID) }}">
        <input type="hidden" name="customer_id" readonly value="{{$customerID}}">
        <x-form.readonly
            name="user_name"
            label="{{ __('debts.CustomerName') }}"
            value="{{ $customerName }}" />
        <x-form.input name="debt_amount">{{ __('debts.DebtAmount') }}*</x-form.input>
        <x-form.input name="paid_amount" value="0">{{ __('debts.paidAmount') }}*</x-form.input>
        <x-form.text-area name="details" class="mb-2">{{ __('debts.moreDetails') }}</x-form.text-area>

        <x-form.button>{{ __('debts.add') }}</x-form.button>

    </x-form.form>


</x-admin>