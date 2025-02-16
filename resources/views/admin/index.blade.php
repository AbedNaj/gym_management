<x-admin title="{{  __('dashboard.title') }}">




    <div class="grid grid-rows-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 mb-8">


        <x-admin.card route="admin.registration.statistics.active" title="{{__('dashboard.ActiveSubscriptions')}}">{{ $activeSubs }}</x-admin.card>


        <x-admin.card title="{{__('dashboard.ExpiringToday')}}" route="admin.registration.statistics.expiredToday" color="red">{{ $expringToday }}</x-admin.card>

        <x-admin.card title="{{__('dashboard.TotalExpired')}}" route="admin.registration.statistics.expired" color="green">{{ $expringTotal }}</x-admin.card>

        <x-admin.card title="{{__('dashboard.TotalMembers')}}" color="yellow">{{ $totalSubs }}</x-admin.card>

        <x-admin.card title="{{__('dashboard.TotalDebt')}}" color="purple">{{ $debtSum }}</x-admin.card>

        <x-admin.card title="{{__('dashboard.TotalPayments')}}" color="gray">{{ $payedSum }}</x-admin.card>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
        <div class="lg:col-span-2 bg-white dark:bg-gray-700 p-6 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">{{ __('dashboard.MonthlySubscriptionsGrowth') }}</h3>
            <div class="h-64">



                {!! $monthlyChart->container() !!}
                {!! $monthlyChart->script() !!}

            </div>
        </div>






    </div>


</x-admin>