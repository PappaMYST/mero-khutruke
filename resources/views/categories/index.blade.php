<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 ">

                    <div class="p-4 ">
                        <h2 class="text-2xl font-extrabold pb-2">Income Categories</h2>
                        <ul class="list-disc sm:text-lg ">
                            @foreach ($categories->where('type', 'income') as $category)
                                <li class="">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4">
                        <h2 class="text-2xl font-extrabold pb-2">Expense Categories</h2>
                        <ul class="list-disc sm:text-lg">
                            @foreach ($categories->where('type', 'expense') as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <x-nav-link url="{{ route('categories.create') }}" class="text-center bg-gray-700" icon="">Add
                    New
                    Category</x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
