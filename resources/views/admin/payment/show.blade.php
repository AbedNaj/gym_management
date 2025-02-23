<x-admin title="">
    <div class="max-w-4xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">

            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                    {{ __('payment.paymentDetails') }}
                </h2>
            </div>


            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('payment.CustomerName') }}</p>
                                <p class="font-medium text-gray-900 dark:text-gray-200">
                                    {{ $payment->customer->name }}

                                </p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('payment.amount') }}</p>
                                <p class="font-medium text-gray-900 dark:text-gray-200">${{ $payment->amount }}</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('payment.paymentDate') }}</p>
                                <p class="font-medium text-gray-900 dark:text-gray-200">{{ $payment->payment_date }}</p>
                            </div>
                        </div>
                    </div>


                    <div class="space-y-4">
                        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                {{ __('payment.accociate') }}
                            </p>
                            <a href="{{ $payment->registration_id  ? route('admin.registration.edit',  $payment->registration_id): route('admin.debt.edit' ,  $payment->debts_id) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors duration-150 dark:bg-indigo-600 dark:hover:bg-indigo-700">
                                {{ __('payment.view') }}

                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <a href=" {{ route('admin.payment.index') }} " class="inline-flex items-center text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('payment.BacktoPayments') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin>