<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 ">

                    <div class="p-4 ">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <h2 class="text-2xl font-extrabold pb-4 text-gray-100 text-center">Income Categories</h2>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                                <thead class="text-xs text-gray-400 uppercase bg-gray-700 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Category name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories->where('type', 'income') as $category)
                                        <tr class=" border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                                            <td scope="row"
                                                class="px-6 py-4 whitespace-nowrap text-gray-100 sm:text-lg">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4 text-left">
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')">
                                                        <i
                                                            class="fa fa-trash shrink-0 w-5 h-5 transition duration-75 text-gray-300 group-hover:text-white mx-1 mt-1"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <h2 class="text-2xl font-extrabold pb-4 text-gray-100 text-center">Expense Categories</h2>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-400">
                                <thead class="text-xs text-gray-400 uppercase bg-gray-700 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Category name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories->where('type', 'expense') as $category)
                                        <tr class=" border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                                            <td scope="row"
                                                class="px-6 py-4 whitespace-nowrap text-gray-100 sm:text-lg">
                                                {{ $category->name }}
                                            </td>
                                            <td class="px-6 py-4 text-left">
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')">
                                                        <i
                                                            class="fa fa-trash shrink-0 w-5 h-5 transition duration-75 text-gray-300 group-hover:text-white mx-1 mt-1"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <x-nav-link url="{{ route('categories.create') }}" class="text-center bg-gray-700" icon="">Add
                    New
                    Category</x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
