<x-admin title="{{ __('registration.EditRegistration') }}">
    <div class="container mx-auto p-4 space-y-6">

        <!-- Registration Details Card -->
        <div class="bg-white dark:bg-dark-secondary shadow rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    {{ __('registration.RegistrationDetails') }}
                </h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.readonly
                    name="user_name"
                    label="{{ __('registration.CustomerName') }}"
                    value="{{ $registration['customer']['name'] }}" />
                <x-form.readonly
                    name="plan_type"
                    label="{{ __('registration.PlanType') }}"
                    value="{{ $registration['plans']['name'] }}" />
                <x-form.readonly
                    name="start_date"
                    label="{{ __('registration.RegistrationDate') }}"
                    value="{{ $registration['start_date'] }}" />
                <x-form.readonly
                    name="end_date"
                    label="{{ __('registration.EndDate') }}"
                    value="{{ $registration['end_date'] }}" />
            </div>
        </div>


        <div class="bg-white dark:bg-dark-secondary shadow rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    {{ __('registration.UpdateRegistrationStatus') }}
                </h2>
            </div>
            <div class="p-6">
                <x-form.form method="post" action="{{ route('admin.registration.update', [$registration]) }}">
                    @csrf
                    @method('PATCH')

                    <x-form.select
                        defaultValue="{{ __('registration.SelectStatus') }}"
                        name="status"
                        :options="$statusOptions">

                        {{ __('registration.RegistrationStatus') }}
                    </x-form.select>

                    <div class="mt-4">
                        <x-form.button>
                            {{ __('registration.save') }}
                        </x-form.button>
                    </div>
                </x-form.form>
            </div>
        </div>
    </div>

</x-admin>