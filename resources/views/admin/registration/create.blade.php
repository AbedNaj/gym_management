<x-admin title="">
    <div class="max-w-3xl  mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white border-b pb-3">
                {{ __('registration.CustomerRegistration') }}
            </h2>

            <x-form.form method="POST">
                <input type="hidden" name="customer_id" value="{{ request()->customer->id }}">

                <div class="mb-6">
                    <x-form.input
                        name="name"
                        readonly
                        value="{{ $customerName }}"
                        class="bg-gray-100 dark:bg-gray-700 cursor-not-allowed">
                        {{ __('registration.CustomerName') }}
                    </x-form.input>
                </div>

                @livewire('registration-plan-date', ['plans' => $plans])

                <div class="mt-8 flex justify-end">
                    <x-form.button class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                        {{ __('registration.CompleteRegistration') }}
                    </x-form.button>
                </div>
            </x-form.form>
        </div>
    </div>
</x-admin>