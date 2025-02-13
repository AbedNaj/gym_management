<x-admin title="Add New Debt">


    <x-form.form method="POST" action="{{ route('admin.debt.store' , $customerID) }}">
        <input type="hidden" name="customer_id" readonly value="{{$customerID}}">
        <x-form.readonly
            name="user_name"
            label="User Name"
            value="{{ $customerName }}" />
        <x-form.input name="debt_amount">Debt Amount*</x-form.input>
        <x-form.input name="paid_amount" value="0">Paid Amount*</x-form.input>
        <x-form.text-area name="details" class="mb-2">More Details</x-form.text-area>

        <x-form.button>New Debt</x-form.button>

    </x-form.form>


</x-admin>