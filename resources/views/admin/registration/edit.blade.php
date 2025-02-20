<x-admin title="{{ __('registration.EditRegistration') }}">
    <div class="container mx-auto p-4 space-y-6">

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
        @if($registration['status'] == 'active')

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

                    <div class="mt-4">

                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            {{ __('registration.setCanceled') }}
                        </button>
                        @if (empty($freeze))


                        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href=" {{ route('admin.freeze.create' , ['registration' => $registration['id']]) }} ">
                            {{ __('registration.setFreeze') }}
                        </a>
                        @endif
                    </div>
                </x-form.form>
            </div>
            @elseif ($registration['status'] == 'freezed')
            <div class="bg-white dark:bg-dark-secondary shadow rounded-lg">
                <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                        {{ __('registration.FreezeDetails') }}
                    </h2>
                </div>

                <div class="p-6 space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 dark:text-gray-300">
                        <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <span class="font-medium">{{ __('registration.FreezePeriodStart') }}:</span>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $freeze->freeze_start_date }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <span class="font-medium">{{ __('registration.FreezePeriodEnd') }}:</span>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $freeze->freeze_end_date }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <span class="font-medium">{{ __('registration.OriginalTerminationDate') }}:</span>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $freeze->registration_end_date }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <span class="font-medium">{{ __('registration.FreezeDuration') }}:</span>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $freeze->freeze_duration .' ' . __('registration.days')}}
                            </span>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <span class="font-medium">{{ __('registration.PostFreezeAvailability') }}:</span>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $freeze->end_date_remening_days . ' ' . __('registration.days')}}
                            </span>
                        </div>


                    </div>


                    <x-form.form method="post" action="{{ route('admin.freeze.update', [$freeze->id]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mt-4 flex justify-center space-x-4">
                            <button type="submit" class="px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg
                               transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500
                               focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                {{ __('registration.TerminateFreezePeriod') }}
                            </button>

                        </div>
                    </x-form.form>
                </div>
            </div>
            @endif
        </div>
    </div>

</x-admin>