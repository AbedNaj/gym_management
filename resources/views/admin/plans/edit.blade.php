<x-admin>

    <x-form.form method="post" action="{{route('admin.plans.update' , $plan) }}">
        @csrf
        @method('PATCH')

        <x-form.input name="name" value="{{ $plan->name}}">
            {{ __('plans.PlanName') }}
        </x-form.input>

        <x-form.input name="duration_in_days" value="{{ $plan->duration_in_days}}">
            {{ __('plans.PlanDuration') }}
        </x-form.input>
        <x-form.input name="price" value="{{ $plan->price}}">
            {{ __('plans.PlanPrice') }}
        </x-form.input>
        <x-form.button>{{ __('plans.save') }}</x-form.button>



    </x-form.form>
</x-admin>