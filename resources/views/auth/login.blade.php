<x-layout>

    <x-page-heading>Login Page</x-page-heading>

    <x-form.form method="POST" action="{{route('login')}}">


        <x-form.input name="email" label="@lang('login.email')">@lang('login.email')</x-form.input>

        <x-form.input name="password" label="@lang('login.password')" type="password">@lang('login.password')</x-form.input>
        <x-form.button>@lang('login.login')</x-form.button>
    </x-form.form>


</x-layout>