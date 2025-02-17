<x-layout>

    <x-page-heading>
        {{ __('verify-email.title') }}
    </x-page-heading>



    <x-form.form id="" method="POST" action="{{ route('verification.send') }}">
        <p class="mt-4 mb-6 text-gray-600 dark:text-gray-300">
            {{ __('verify-email.description') }}
        </p>

        <x-form.button>{{ __('verify-email.resend') }}</x-form.button>


        <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
            {{ __('verify-email.dashboard') }}
            <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:underline">
                {{ __('verify-email.dashboard2') }}
            </a>.
        </p>
    </x-form.form>

    </div>

</x-layout>