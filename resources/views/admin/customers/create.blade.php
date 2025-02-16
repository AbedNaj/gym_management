<x-admin title="Add New Customer">


    <x-form.form method="POST">
        <x-form.input name="name"> {{ __('customers.CustomerName') }}</x-form.input>
        <x-form.input name="phoneNumber"> {{ __('customers.PhoneNumber') }}</x-form.input>

        <x-form.button>{{ __('customers.add') }}</x-form.button>

    </x-form.form>


</x-admin>