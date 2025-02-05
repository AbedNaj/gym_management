<x-admin>

    <x-form.form method="post" action="{{route('admin.customers.update' , $customer) }}">
        @csrf
        @method('PATCH')

        <x-form.input name="name" value="{{ $customer->name}}">
            Customer Name
        </x-form.input>

        <x-form.input name="phoneNumber" value="{{ $customer->phoneNumber}}">
            Customer Phone Number
        </x-form.input>
        <x-form.button>Save</x-form.button>



    </x-form.form>
</x-admin>