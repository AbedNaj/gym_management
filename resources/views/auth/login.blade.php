<x-layout>

    <x-page-heading>Login Page</x-page-heading>

    <x-form.form method="POST" id="" action="{{route('login')}}">


        <x-form.input name="email" label="@lang('login.email')">@lang('login.email')</x-form.input>

        <x-form.input name="password" label="@lang('login.password')" type="password">@lang('login.password')</x-form.input>
        <a href="{{  route('forgot')}}" class="flex text-sm text-gray-500 mb-2 dark:text-gray-400">{{ __('login.forgot') }}</a>
        <x-form.button>@lang('login.login')</x-form.button>
    </x-form.form>


</x-layout>