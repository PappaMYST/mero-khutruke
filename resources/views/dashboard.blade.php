<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:flex justify-between text-gray-100">
                <span class="text-xl">
                    @php
                        $time = date('H');
                        if ($time < 12) {
                            echo 'Good Morning!';
                        } elseif ($time < 17) {
                            echo 'Good Afternoon!';
                        } else {
                            echo 'Good Evening!';
                        }
                    @endphp
                    {{ Auth::user()->name }}
                </span>
                <span class="text-xl">
                    Today is
                    @php
                        echo date('l, jS \o\f F, Y');
                    @endphp
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
