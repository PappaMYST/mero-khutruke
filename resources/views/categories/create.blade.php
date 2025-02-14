<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-100">Category Name:</label>
                        <input type="text" id="name" name="name"
                            class="border text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light" />
                    </div>

                    <div>
                        <fieldset>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-100">Select
                                Category:</label>
                            <legend class="sr-only">Type</legend>

                            <div class="flex items-center mb-4">
                                <input id="type-option-1" type="radio" name="type" value="income"
                                    class="w-4 h-4 bg-gray-700 border-gray-600 focus:ring-2 focus:ring-blue-600 focus:bg-blue-600 "
                                    checked>
                                <label for="type-option-1" class="block ms-2  text-sm font-medium text-gray-100">
                                    Income
                                </label>
                            </div>

                            <div class="flex items-center mb-4">
                                <input id="type-option-2" type="radio" name="type" value="expense"
                                    class="w-4 h-4 bg-gray-700 border-gray-600 focus:ring-2 focus:ring-blue-600 focus:bg-blue-600 "
                                    checked>
                                <label for="type-option-2" class="block ms-2  text-sm font-medium text-gray-100">
                                    Expense
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <x-primary-button type="submit" class="bg-gray-700 mt-0 hover:bg-gray-500">Create
                        Category</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
