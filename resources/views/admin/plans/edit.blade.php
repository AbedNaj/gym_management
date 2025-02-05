<x-admin>

    <x-form.form method="post" action="{{route('admin.plans.update' , $plan) }}">
        @csrf
        @method('PATCH')

        <x-form.input name="name" value="{{ $plan->name}}">
            Plan Name
        </x-form.input>

        <x-form.input name="duration_in_days" value="{{ $plan->duration_in_days}}">
            Plan Duration
        </x-form.input>
        <x-form.input name="price" value="{{ $plan->price}}">
            Plan Price
        </x-form.input>
        <x-form.button>Save</x-form.button>



    </x-form.form>
</x-admin>