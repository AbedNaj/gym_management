<x-admin title="Select A Customer">
    <section class="shadow-lg rounded-xl bg-white dark:bg-gray-800 p-6 max-w-xl mx-auto">
        <section class="space-y-4">
            @livewire('debt-customer-search')

            @if (isset($customerName))
            <div class="space-y-3 border-b pb-4 border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Customer Details</h3>
                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-gray-600 dark:text-gray-400">Name:</dt>
                    <dd class="col-span-2 font-medium text-gray-900 dark:text-gray-200">{{ $customerName }}</dd>
                </div>
            </div>

            @if($debts->isNotEmpty())
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Current Debt Status</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="border p-4 rounded-lg dark:border-gray-700">
                        <dt class="text-gray-600 dark:text-gray-400">Total Debt</dt>
                        <dd class="text-xl font-bold text-red-600 dark:text-red-400">
                            {{ number_format($debt_amount, 2) }}
                        </dd>
                    </div>
                    <div class="border p-4 rounded-lg dark:border-gray-700">
                        <dt class="text-gray-600 dark:text-gray-400">Total Paid</dt>
                        <dd class="text-xl font-bold text-green-600 dark:text-green-400">
                            {{ number_format($paid_amount, 2) }}
                        </dd>
                    </div>
                </div>


            </div>
            @else
            <div class="text-center p-6 border rounded-lg dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    This customer doesn't have any debt history.
                </p>
            </div>
            @endif

            <div class="flex justify-between items-center pt-4">
                @if($debts->isNotEmpty())
                <a href="{{ route('admin.debt.showAll', $customerID) }}" class="inline-flex items-center text-accent hover:text-accent-hover transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    View All Debts
                </a>
                @endif

                <x-admin.button href="{{ route('admin.debt.create', $customerID) }}">
                    Add New Debt
                </x-admin.button>
            </div>
            @endif
        </section>
    </section>
</x-admin>