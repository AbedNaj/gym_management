<x-admin title="Customer Registration">



    <x-form.form method="POST">
        <input type="hidden" name="customer_id" value="{{request()->customer->id}}">
        <x-form.input name="name" readonly value="{{$customerName}}">Customer Name</x-form.input>


        @livewire('registration-plan-date', [ 'plans'=>$plans])



        <x-form.button>Register</x-form.button>

    </x-form.form>


</x-admin>