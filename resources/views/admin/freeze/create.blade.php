<x-admin title="">

    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 ">
        <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('registration.freeze') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>
        <x-form.form method="POST">
            <input type="hidden" name="id" value=" {{ $registration['id'] }} ">
            <x-form.input readonly name="name" value="{{ $registration['customer']['name']}} "> {{ __('customers.CustomerName') }}</x-form.input>
            <x-form.input name="freeze_duration" type="number">{{ __('registration.freezeDuration') }}</x-form.input>

            <x-form.button>{{ __('registration.setFreeze') }}</x-form.button>

        </x-form.form>

    </div>
</x-admin>