<x-layout>

    <x-page-heading></x-page-heading>
    <section class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
        <div class="mb-6 border-b text-center pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('login.login') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>

        <x-form.form method="POST" id="" action="{{route('login')}}">


            <x-form.input name="email" label="@lang('login.email')">@lang('login.email')</x-form.input>

            <x-form.input name="password" label="@lang('login.password')" type="password">@lang('login.password')</x-form.input>
            <a href="{{  route('forgot')}}" class="flex text-sm text-gray-500 mb-2 dark:text-gray-400">{{ __('login.forgot') }}</a>
            <x-form.button>@lang('login.login')</x-form.button>
        </x-form.form>
    </section>

</x-layout>