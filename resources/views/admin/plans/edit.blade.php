<x-admin title="">

    <section class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">


        <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                {{ __('plans.planEdit') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400">

            </p>
        </div>

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


    </section>
    </x-form.form>
</x-admin>