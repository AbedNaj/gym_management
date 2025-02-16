<x-form.form method="post" id="" action="{{ route('logout') }}">
    @csrf
    @method('DELETE')

    <button
        class="block px-4 py-2 text-sm text-red-600  hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white">
        {{ __('admin.signOut') }}
    </button>

</x-form.form>