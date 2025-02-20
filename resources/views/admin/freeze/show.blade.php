<x-admin title="">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">

            <div class="mb-4">
                <h1 class="text-2xl font-bold text-gray-900">{{ __('registration.FreezeDetails') }}</h1>

            </div>


            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('freeze.customername') }}</h2>
                    <p class="mt-2 text-xl font-semibold text-gray-800">
                        {{ $freeze->registration->customer->name }}

                    </p>
                </div>


                <div class="px-6 py-5 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">{{ __('registration.FreezePeriodStart') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $freeze->freeze_start_date }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">{{ __('registration.FreezePeriodEnd') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $freeze->freeze_end_date }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">{{ __('registration.OriginalTerminationDate') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $freeze->registration_end_date }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">{{ __('registration.freezeDuration') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $freeze->freeze_duration . ' ' . __('registration.days') }} </dd>
                    </div>
                </div>


                <div class="px-6 py-5 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500">{{ __('registration.PostFreezeAvailability') }}</h3>
                    <div class="mt-2 prose prose-sm text-gray-900">
                        <p>{{ $freeze->end_date_remening_days }}</p>
                    </div>
                </div>


                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <a
                            href=" {{ route('admin.freeze.index') }} "
                            class="text-sm font-medium text-gray-700 hover:text-gray-800">
                            &larr; {{ __('freeze.BacktoFreezes') }}
                        </a>
                        @if ($freeze->status == 'active')


                        <form action="{{ route('admin.freeze.update', [$freeze->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                data-confirm="{{ __('freeze.FreezeCancelAlert') }}"
                                onclick="return confirm(this.getAttribute('data-confirm'))">
                                {{ __('registration.CancelTheFreeze') }}
                            </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>