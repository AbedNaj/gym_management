<x-admin title="Select A User">
    <section class="shadow-lg rounded-xl bg-white dark:bg-gray-800 p-6 max-w-xl mx-auto">
        <section class="space-y-4">
            @livewire('Customer-Search')

            @if (isset($customerName))
            <div class="space-y-3 border-b pb-4 border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Customer Details</h3>

                <div class="grid grid-cols-3 gap-4">
                    <dt class="text-gray-600 dark:text-gray-400">Name:</dt>
                    <dd class="col-span-2 font-medium text-gray-900 dark:text-gray-200">{{ $customerName }}</dd>

                    <dt class="text-gray-600 dark:text-gray-400">Status:</dt>
                    <dd class="col-span-2">
                        <span @class([ 'px-2 py-1 rounded-full text-sm' , 'bg-green-100 text-green-800'=> $registration?->status === 'active',
                            'bg-red-100 text-red-800' => $registration?->status === 'expired',
                            'bg-orange-100 text-orange-800' => $registration?->status === 'suspended',
                            'bg-white border border-gray-300 text-gray-700' => $registration?->status === 'canceled',
                            'bg-yellow-100 text-yellow-800' => $registration?->status === 'pending',
                            ])>
                            {{ $registration?->status ?? 'Never Registered' }}
                        </span>
                    </dd>

                    <dt class="text-gray-600 dark:text-gray-400">Start Date:</dt>
                    <dd class="col-span-2 text-gray-700 dark:text-gray-300">
                        {{ optional($registration)->start_date ?? 'N/A' }}
                    </dd>

                    <dt class="text-gray-600 dark:text-gray-400">End Date:</dt>
                    <dd class="col-span-2 text-gray-700 dark:text-gray-300">
                        {{ optional($registration)->end_date ?? 'N/A' }}
                    </dd>
                </div>
            </div>

            <a href="{{route('admin.registration.showAll' , $customerID)}}" class="inline-flex items-center text-accent hover:text-accent-hover transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                View All Registrations
            </a>


            @if ($registration?->status !== 'active')
            <x-admin.button

                href="{{ route('admin.registration.create' , $customerID ) }}">
                Register
            </x-admin.button>
            @endif

            @endif
        </section>
    </section>


</x-admin>