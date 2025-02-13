<x-admin title="Edit Registration">
    <div class="container mx-auto p-4 space-y-6">

        <!-- Registration Details Card -->
        <div class="bg-white dark:bg-dark-secondary shadow rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    Registration Details
                </h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.readonly
                    name="user_name"
                    label="User Name"
                    value="{{ $registration['customer']['name'] }}" />
                <x-form.readonly
                    name="plan_type"
                    label="Plan Type"
                    value="{{ $registration['plans']['name'] }}" />
                <x-form.readonly
                    name="start_date"
                    label="Registration Start Date"
                    value="{{ $registration['start_date'] }}" />
                <x-form.readonly
                    name="end_date"
                    label="Registration End Date"
                    value="{{ $registration['end_date'] }}" />
            </div>
        </div>


        <div class="bg-white dark:bg-dark-secondary shadow rounded-lg">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    Update Registration Status
                </h2>
            </div>
            <div class="p-6">
                <x-form.form method="post" action="{{ route('admin.registration.update', [$registration]) }}">
                    @csrf
                    @method('PATCH')

                    <x-form.select
                        defaultValue="Select a status"
                        name="status"
                        :options="[ 1 => 'Active', 2 => 'Expired', 4 => 'Canceled' ]">
                        Registration Status
                    </x-form.select>

                    <div class="mt-4">
                        <x-form.button>
                            Save Changes
                        </x-form.button>
                    </div>
                </x-form.form>
            </div>
        </div>
    </div>

</x-admin>