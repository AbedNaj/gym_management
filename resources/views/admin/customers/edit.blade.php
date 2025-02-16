<x-admin>

    <x-form.form method="post" action="{{route('admin.customers.update' , $customer) }}">
        @csrf
        @method('PATCH')

        <x-form.input name="name" value="{{ $customer->name}}">
            {{ __('customers.CustomerName') }}
        </x-form.input>

        <x-form.input name="phoneNumber" value="{{ $customer->phoneNumber}}">
            {{ __('customers.PhoneNumber') }}
        </x-form.input>
        <x-form.button>{{ __('customers.save') }}</x-form.button>



    </x-form.form>
</x-admin>