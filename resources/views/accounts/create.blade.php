<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <form method="post" action="{{ route('accounts.store') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-100">Account Name:</label>
                        <input type="text" id="name" name="name"
                            class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light" />
                    </div>
                    <div class="mb-5">
                        <label for="balance" class="block mb-2 text-sm font-medium text-gray-100">Balance:</label>
                        <input type="number" id="balance" name="balance"
                            class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light" />
                    </div>
                    <x-primary-button type="submit">Create
                        Account</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
