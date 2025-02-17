<x-layout>

    <x-page-heading>{{ __('forgot-password.title') }}</x-page-heading>
    @if (session('status'))
    <x-flesh-message sessionName="status"></x-flesh-message>
    @endif
    <x-form.form method="post" id="">

        <x-form.input name="email">{{ __('forgot-password.Email') }}</x-form.input>
        <x-form.button>{{ __('forgot-password.Link') }}</x-form.button>
    </x-form.form>

</x-layout>