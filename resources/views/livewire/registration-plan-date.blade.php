<div>

    <label for="plans_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan</label>


    <select wire:model.live="selectedPlanId" name="plans_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select A Plan</option>
        @foreach ($plans as $index => $plan)

        <option value="{{ $plan['id'] }}">
            {{ $plan['name'] ?? 'No Plan Available' }}
        </option>
        @endforeach
    </select>

    <p class=" text-sm ">Plan Duration : <strong>{{$planDuration}}</strong> </p>
    <p class="text-sm text-red-500 mt-1">{{$errors->first('plans_id') }}</p>


    <div class="">
        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registration Start Date</label>

        <input
            wire:model.live="date"
            type="date"
            name="start_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{old('plans_id')}}" , />

        <p class="text-sm text-red-500 mt-1">{{$errors->first('$name') }}</p>

        <p>📅 Registration End Date: <strong>{{$currentDate}}</strong></p>

        <div class="mt-2 mb-3">

            <label for="paid_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Payed</label>
            <input type="hidden" name="plan_price" value="{{$planPrice}}" readonly>
            <input
                name="paid_amount"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{$planPrice}}"></input>
            <p>Plan Price : <strong>{{$planPrice}}</strong> </p>
            <p class="text-sm text-red-500 mt-1">{{$errors->first('paid_amount') }}</p>
        </div>



    </div>


</div>