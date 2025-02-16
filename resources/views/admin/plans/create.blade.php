<x-admin title="Add New Plan">


    <x-form.form method="POST">
        <x-form.input name="name">{{ __('plans.PlanName') }}</x-form.input>
        <x-form.input name="duration_in_days" placeholder="{{ __('plans.indays') }}">{{ __('plans.PlanDuration') }}</x-form.input>
        <x-form.input name="price">{{ __('plans.PlanPrice') }}</x-form.input>

        <x-form.button>{{ __('plans.add') }}</x-form.button>

    </x-form.form>


</x-admin>