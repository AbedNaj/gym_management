<x-admin title="{{ __('plans.title') }}">

    <x-admin.admin-heading
        addRoute="admin.plans.create"
        searchRoute="admin.plans.search"
        inputName="name">

        {{ __('plans.AddNewPlan') }}
    </x-admin.admin-heading>
    <x-admin.table
        deleteRoute="admin.plans.delete"
        editRoute="admin.plans.edit"
        :columns="[
            'name' =>['name'=> __('plans.PlanName')],
            'duration_in_days' =>['name'=> __('plans.PlanDuration')],
            'price' =>['name'=> __('plans.PlanPrice')],
            ]"
        :datas="$plans" />



    <div class="mt-2">

        {{ $plans->links() }}
    </div>
</x-admin>