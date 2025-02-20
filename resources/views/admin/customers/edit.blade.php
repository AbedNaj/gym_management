<x-admin title="">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">

        <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('customers.customerEdit') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>
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

    </div>

    </x-form.form>
</x-admin>