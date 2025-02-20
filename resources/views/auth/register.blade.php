<x-layout>

    <x-page-heading></x-page-heading>

    <section class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">

        <div class="mb-6 border-b text-center pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('register.register') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>

        <x-form.form method="POST" id="" action="{{route('register')}}">
            <x-form.input name="name">@lang('register.name')</x-form.input>
            <x-form.input name="gymName">@lang('register.gymName')</x-form.input>
            <x-form.input name="email">@lang('register.email')</x-form.input>
            <x-form.input name="phone">@lang('register.phone')</x-form.input>
            <x-form.input name="location">@lang('register.location')</x-form.input>
            <x-form.input name="password" type="password">@lang('register.password')</x-form.input>
            <x-form.input name="password confirmation" type="password">@lang('register.confirmation')</x-form.input>
            <x-form.button>@lang('register.register')</x-form.button>
        </x-form.form>

    </section>

</x-layout>