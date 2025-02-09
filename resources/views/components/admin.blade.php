@props(['title'=>'Dashboard OverView'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

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
</head>

<body class="bg-gray-100 dark:bg-gray-900 transition-colors dark:text-gray-200 duration-300">
    <div class="min-h-screen flex flex-col md:flex-row">

        <button id="mobileMenuButton" class="md:hidden fixed top-4 left-4 z-50 p-2 text-gray-600 dark:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>


        <aside id="sidebar" class="bg-white min-h-screen dark:bg-gray-800 w-64 shadow-lg fixed h-full transform -translate-x-full md:translate-x-0 sidebar-transition duration-300 z-40 md:static md:flex flex-col">
            <div class="p-4 border-b dark:border-gray-700">
                <h2 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Admin Panel</h2>
            </div>
            <nav class="mt-4 flex-grow">
                <x-admin.nav :active="request()->is('admin')" href="/admin" svg="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">Dashboard</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/customers*')" href="{{route('admin.customers.index')}}" svg="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">Customers</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/plans*')" href="{{route('admin.plans.index')}}" svg="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z">Subscription Plans</x-admin.nav>
                <x-admin.nav :active="request()->is('admin/registration*')" href="{{route('admin.registration.index')}}" svg="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z">Registration</x-admin.nav>

            </nav>
        </aside>


        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{$title}}</h1>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <button id="theme-toggle" class="p-2 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg">
                            <span id="theme-icon">🌙</span>
                        </button>
                        <span class="text-gray-700 dark:text-gray-300">Admin User</span>
                    </div>
                </div>
            </div>

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