<x-admin title="Subscription Plans">

    <x-admin.admin-heading
        addRoute="admin.plans.create"
        searchRoute="admin.plans.search"
        inputName="name">

        Add New Plan
    </x-admin.admin-heading>
    <x-admin.table
        deleteRoute="admin.plans.delete"
        editRoute="admin.plans.edit"
        :columns="[
            'name' =>['name'=> 'Plan Name'],
            'duration_in_days' =>['name'=> 'Plan Duration'],
            'price' =>['name'=> 'Plan Price'],
            ]"
        :datas="$plans" />



    <div class="mt-2">

        {{ $plans->links() }}
    </div>
</x-admin>