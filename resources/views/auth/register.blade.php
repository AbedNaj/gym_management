<x-layout>

    <x-page-heading>Register Page</x-page-heading>

    <x-form.form method="POST" action="{{route('register')}}">
        <x-form.input name="name">@lang('register.name')</x-form.input>
        <x-form.input name="gymName">@lang('register.gymName')</x-form.input>
        <x-form.input name="email">@lang('register.email')</x-form.input>
        <x-form.input name="phone">@lang('register.phone')</x-form.input>
        <x-form.input name="location">@lang('register.location')</x-form.input>
        <x-form.input name="password" type="password">@lang('register.password')</x-form.input>
        <x-form.input name="password confirmation" type="password">@lang('register.confirmation')</x-form.input>
        <x-form.button>@lang('register.register')</x-form.button>
    </x-form.form>



</x-layout>