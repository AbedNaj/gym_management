<x-layout>

    <x-page-heading>Register Page</x-page-heading>

    <x-form.form method="POST" action=" {{ route('register') }}">
        <x-form.input name="name" label="Your Name"></x-form.input>
        <x-form.input name="gymName" label="Your Gym Name"></x-form.input>
        <x-form.input name="email" label="Your Email"></x-form.input>
        <x-form.input name="phone" label="Phone Number"></x-form.input>
        <x-form.input name="location" label="Your Gym Address"></x-form.input>
        <x-form.input name="password" label="Your Password" type="password"></x-form.input>
        <x-form.input name="password confirmation" label="password confirmation" type="password"></x-form.input>
        <x-form.button>Register</x-form.button>
    </x-form.form>



</x-layout>