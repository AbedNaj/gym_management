<x-admin title="">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">

        <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ $customerName }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">
                {{ __('debts.DebtPay') }}
            </p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <dt class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('debts.DebtAmount') }}</dt>
                <dd class="mt-1 text-2xl font-semibold text-red-600 dark:text-red-400">
                    {{ number_format($debt->debt_amount, 2) }}
                </dd>
            </div>

            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                <dt class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('debts.paidAmount') }}</dt>
                <dd class="mt-1 text-2xl font-semibold text-green-600 dark:text-green-400">
                    {{ number_format($debt->paid_amount, 2) }}
                </dd>
            </div>
        </div>


        <x-form.form method="post" action="{{ route('admin.debt.update', $debt) }}">
            @csrf
            @method('PATCH')

            <div class="space-y-6">


                <input type="hidden" name="debt_amount" value="{{$debt->debt_amount}}">

                <x-form.input name="paid_amount" type="number" step="1"
                    label="Paid Amount"
                    value="{{   $debt->debt_amount -$debt->paid_amount }}"
                    helper="Update the paid amount for this debt">{{ __('debts.PaymentAmount') }}</x-form.input>


                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('debts.status') }} :</dt>
                    <dd class="mt-1">
                        <span @class([ 'px-3 py-1  text-sm font-medium' , 'bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-400'=> $debt->status == 'paid',
                            'bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-400' => $debt->status == 'unpaid'
                            ])>
                            {{ $debt->status == 'paid' ? 'Fully Paid' : 'unpaid' }}
                        </span>
                    </dd>

                    <dt class="text-sm font-medium text-gray-600 dark:text-gray-300 mt-2">{{ __('debts.DebtDetails') }} :</dt>
                    <dd>{{ $debt->details }}</dd>
                </div>


                <div class="flex justify-between items-center pt-6">
                    <a href="{{ route('admin.debt.showAll', $debt->customer_id) }}"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                        &larr; {{ __('debts.ViewAllDebts') }}

                    </a>
                    @if ($debt->debt_amount > $debt->paid_amount)
                    <x-form.button>
                        {{ __('debts.DebtPay') }}
                    </x-form.button>
                    @endif

                </div>
            </div>
        </x-form.form>
    </div>


</x-admin>