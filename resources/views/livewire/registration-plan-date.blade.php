<div>

    <label for="plans_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan</label>


    <select wire:model="selectedPlanId" wire:change="selectetIndexChanged" name="plans_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select A Plan</option>
        @foreach ($plans as $index => $plan)

        <option value="{{ $plan['id'] }}">
            {{ $plan['name'] ?? 'No Plan Available' }}
        </option>
        @endforeach
    </select>
    <p class="text-sm text-red-500 mt-1">{{$errors->first('plans_id') }}</p>


    <div class=" mb-5">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registration Start Date</label>

        <input
            wire:model="date"
            wire:change="currentDateChanged"

            type="date"
            name="start_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{old('plans_id')}}" , />

        <p class="text-sm text-red-500 mt-1">{{$errors->first('$name') }}</p>

        <p>📅 Registration End Date: <strong>{{$currentDate}}</strong></p>


    </div>

</div>