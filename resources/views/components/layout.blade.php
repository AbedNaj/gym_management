<!DOCTYPE html>
<html lang=" {{app()->getLocale()}}" dir="{{app()->getLocale() == 'en' ? 'ltr' : 'rtl'}}" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymArcane - Manage Your Gym</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-gray-50 text-dark-primary dark:bg-dark-primary dark:text-white">
    <nav
        class="fixed w-full bg-white/95 backdrop-blur-sm border-b border-gray-200 dark:bg-dark-primary/95 dark:border-gray-800 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/"> <span class="text-2xl mx-3 font-bold gradient-text mr-3">GymArcane</span></a>
                    <button id="theme-toggle"
                        class="p-2 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg">
                        <span id="theme-icon">🌙</span>
                    </button>
                    <a class="mx-3" href="{{ route('lang.change', app()->getLocale() == 'ar' ? 'en' : 'ar') }}">
                        {{ __('home.toggle_lang') }}
                    </a>

                </div>
                <div class="flex items-center space-x-4">
                    <a href="#"
                        class="text-gray-600 hover:text-dark-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">@lang('home.pricing')</a>

                    <a href="#"
                        class="text-gray-600 hover:text-dark-primary dark:text-gray-300 dark:hover:text-white px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">@lang('home.about')</a>
                    @auth
                        <form method="POST" action="/logout">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition text-white">@lang('home.logout')</button>
                        </form>
                        <a href="{{route('admin.')}}"
                            class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition text-white">@lang('home.admin')</a>

                    @endauth
                    @guest
                        <a href="{{route('register')}}"
                            class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition text-white">@lang('home.register')</a>
                        <a href="{{route('login')}}"
                            class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition text-white">@lang('home.login')</a>
                    @endguest



                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>

</html>