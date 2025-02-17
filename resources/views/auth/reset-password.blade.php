<x-layout>

    <x-page-heading>{{ __('reset-password.title') }}</x-page-heading>
    @if (session('status'))
    <x-flesh-message sessionName="status"></x-flesh-message>
    @endif
    <x-form.form method="POST" id="" action="{{ route('password.update') }}" value="">
        <input type="hidden" name="token" value="{{ $token }}">
        <x-form.input name="email">@lang('register.email')</x-form.input>
        <x-form.input name="password" type="password">@lang('register.password')</x-form.input>
        <x-form.input name="password_confirmation" type="password">@lang('register.confirmation')</x-form.input>

        <x-form.button>{{ __('reset-password.title') }}</x-form.button>
    </x-form.form>



</x-layout>