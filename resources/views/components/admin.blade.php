@props(['title'=>'Dashboard '])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media (max-width: 767px) {
            .sidebar-transition {
                transition: transform 0.3s ease-in-out;
            }
        }
    </style>
    <script>
        if (localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 transition-colors dark:text-gray-200 duration-300">
    <div class="min-h-screen flex flex-col md:flex-row">

        <button id="mobileMenuButton" class="md:hidden fixed top-4 left-4 z-50 p-2 text-gray-600 dark:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <aside id="sidebar" class=" bg-admin-aside   dark:bg-gray-800 w-64 shadow-lg fixed h-full md:h-auto transform -translate-x-full md:translate-x-0 sidebar-transition duration-300 z-40 md:static md:flex flex-col">

            <div class="p-4 border-b dark:border-gray-700">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400">Admin Panel</h2>
            </div>

            <nav class="mt-4 flex-grow">
                <x-admin.nav :active="request()->is('admin')" href="/admin" svg="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">{{ __('admin.Dashboard') }}</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/customers*')" href="{{route('admin.customers.index')}}" svg="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">{{ __('admin.customers') }}</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/plans*')" href="{{route('admin.plans.index')}}" svg="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z">{{ __('admin.SubscriptionPlans') }}</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/registration*')" href="{{route('admin.registration.index')}}" svg="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">{{ __('admin.Registration') }}</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/debt*')" href="{{route('admin.debts.index')}}" svg="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z">{{ __('admin.Debts') }}</x-admin.nav>
            </nav>



        </aside>


        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-7">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{$title}}</h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <x-theme-change></x-theme-change>
                        <x-drop-down></x-drop-down>
                    </div>
                </div>
            </div>
            @if (session('success'))
            <x-flesh-message></x-flesh-message>

            @endif
            {{ $slot }}
        </main>
    </div>

    <script>
        document.getElementById("mobileMenuButton").addEventListener("click", function() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
            sidebar.classList.toggle("translate-x-0");
        });
    </script>

</body>

</html>