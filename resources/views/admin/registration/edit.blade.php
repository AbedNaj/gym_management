<x-admin title="Registration Edit">
    <x-form.form method="post" action="{{route('admin.registration.update' , [$registration])}}">
        @csrf
        @method('PATCH')
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


        <x-form.select
            defaultValue="Change Registration Status"
            name="status"
            :options="[
               1 => 'Active', 
                2 => 'Expired',
                4 => 'Canceled'        
            ]">
            Registration Status
        </x-form.select>

        <x-form.button>Save</x-form.button>
    </x-form.form>
</x-admin>