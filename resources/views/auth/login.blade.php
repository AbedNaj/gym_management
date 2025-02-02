<x-layout>

    <x-page-heading>Login Page</x-page-heading>

    <x-form.form method="POST" action="/login">


        <x-form.input name="email" label="Your Email"></x-form.input>

        <x-form.input name="password" label="Your Password" type="password"></x-form.input>

        <x-form.button>Login</x-form.button>
    </x-form.form>


</x-layout>