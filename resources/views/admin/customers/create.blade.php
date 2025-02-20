<x-admin title="">

    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 ">
        <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('customers.customerAdd') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>
        <x-form.form method="POST">
            <x-form.input name="name"> {{ __('customers.CustomerName') }}</x-form.input>
            <x-form.input name="phoneNumber"> {{ __('customers.PhoneNumber') }}</x-form.input>

            <x-form.button>{{ __('customers.add') }}</x-form.button>

        </x-form.form>

    </div>
</x-admin>