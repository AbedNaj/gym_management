<x-admin title="Add New Plan">


    <x-form.form method="POST">
        <x-form.input name="name">Plan Name*</x-form.input>
        <x-form.input name="duration_in_days" placeholder="in days">Plan Duration*</x-form.input>
        <x-form.input name="price">Plan Price*</x-form.input>

        <x-form.button>New Plan</x-form.button>

    </x-form.form>


</x-admin>