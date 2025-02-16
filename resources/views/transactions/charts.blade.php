<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-4 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-200">
                <div class="flex rounded-md shadow-xs items-center justify-between mr-1 mb-4">
                    <h2 class="text-2xl">Statistics</h2>
                    <div>
                        <a href="{{ route('transactions.charts', ['view' => 'daily', 'month' => $selectedMonth, 'year' => $selectedYear]) }}"
                            aria-current="page"
                            class="px-4 py-2 text-sm font-medium text-gray-200 bg-gray-800 border border-gray-700 rounded-s-lg hover:bg-gray-700 hover:text-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-gray-200">
                            Daily
                        </a>
                        {{-- <a href="{{ route('dashboard', ['view' => 'monthly', 'year' => $selectedYear]) }}"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            Settings
                        </a> --}}
                        <a href="{{ route('transactions.charts', ['view' => 'monthly', 'year' => $selectedYear]) }}"
                            class="px-4 py-2 text-sm font-medium text-gray-200 bg-gray-800 border border-gray-700 rounded-e-lg hover:bg-gray-700 hover:text-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-gray-200">
                            Monthly
                        </a>
                    </div>
                </div>
                @if ($viewType == 'daily')
                    <div>
                        <a
                            href="{{ route('transactions.charts', ['view' => 'daily', 'month' => $selectedMonth - 1, 'year' => $selectedYear]) }}">
                            <i class="fa fa-chevron-left text-xl mr-2 w-5 h-5"></i></a>
                        <span class="text-xl">
                            {{ date('F Y', mktime(0, 0, 0, $selectedMonth, 1, $selectedYear)) }}
                        </span>
                        <a
                            href="{{ route('transactions.charts', ['view' => 'daily', 'month' => $selectedMonth + 1, 'year' => $selectedYear]) }}"><i
                                class="fa fa-chevron-right text-xl ml-2 w-5 h-5"></i></a>
                    </div>
                @endif

                @if ($viewType == 'monthly')
                    <div>
                        <a
                            href="{{ route('transactions.charts', ['view' => 'monthly', 'year' => $selectedYear - 1]) }}"><i
                                class="fa fa-chevron-left text-xl mr-2 w-5 h-5"></i></a>
                        <span class="text-xl">
                            {{ $selectedYear }}
                        </span>
                        <a
                            href="{{ route('transactions.charts', ['view' => 'monthly', 'year' => $selectedYear + 1]) }}">
                            <i class="fa fa-chevron-right text-xl ml-2 w-5 h-5"></i></a>
                    </div>
                @endif
                @if ($viewType == 'daily')
                    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-300">
                            <thead class="text-xs uppercase bg-gray-700 text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Income
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Expense
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-900">
                                    <td class="px-6 py-4 text-emerald-500">{{ number_format($monthlyIncome, 2) }}</td>
                                    <td class="px-6 py-4 text-red-500">{{ number_format($monthlyExpense, 2) }}</td>
                                    <td>{{ number_format($monthlyTotal, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($viewType == 'monthly')
                    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-300">
                            <thead class="text-xs uppercase bg-gray-700 text-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Income
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Expense
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-900">
                                    <td class="px-6 py-4 text-emerald-500">{{ number_format($yearlyIncome, 2) }}</td>
                                    <td class="px-6 py-4 text-red-500">{{ number_format($yearlyExpense, 2) }}</td>
                                    <td>{{ number_format($yearlyTotal, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="mb-4 border-b border-gray-700">
                    <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center"
                        id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="text-purple-500 hover:text-purple-500 border-purple-500"
                        data-tabs-inactive-classes="border-transparent text-gray-300 hover:text-gray-300"
                        role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                                data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false" onclick="showChart('income')" id="incomeBtn"
                                class="active">Income</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg  hover:border-gray-300 hover:text-gray-300"
                                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button"
                                role="tab" aria-controls="dashboard" aria-selected="false"
                                onclick="showChart('expense')" id="expenseBtn">Expense</button>
                        </li>

                    </ul>
                </div>
                <div id="default-styled-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-800" id="styled-profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div id="incomeChartContainer" class="flex justify-center">
                            <div class="w-96 h-96">
                                <canvas id="incomeChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-800" id="styled-dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <div id="expenseChartContainer" class="flex justify-center hidden">
                            <div class="w-96 h-96">
                                <canvas id="expenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
            <script>
                function showChart(type) {
                    if (type === 'income') {
                        document.getElementById('incomeChartContainer').classList.remove('hidden');
                        document.getElementById('expenseChartContainer').classList.add('hidden');
                        document.getElementById('incomeBtn').classList.add('active');
                        document.getElementById('expenseBtn').classList.remove('active');
                    } else {
                        document.getElementById('incomeChartContainer').classList.add('hidden');
                        document.getElementById('expenseChartContainer').classList.remove('hidden');
                        document.getElementById('incomeBtn').classList.remove('active');
                        document.getElementById('expenseBtn').classList.add('active');
                    }
                }
                // Income Chart
                const incomeCtx = document.getElementById('incomeChart').getContext('2d');
                new Chart(incomeCtx, {
                    type: 'pie',
                    data: {
                        labels: {!! json_encode($incomeCategories->keys()->map(fn($id) => \App\Models\Category::find($id)->name)) !!},
                        datasets: [{
                            data: {!! json_encode($incomeCategories->values()) !!},
                            backgroundColor: ['#4CAF50', '#FFC107', '#2196F3', '#E91E63', '#9C27B0']
                        }]
                    }
                });
                // Expense Chart
                const expenseCtx = document.getElementById('expenseChart').getContext('2d');
                new Chart(expenseCtx, {
                    type: 'pie',
                    data: {
                        labels: {!! json_encode($expenseCategories->keys()->map(fn($id) => \App\Models\Category::find($id)->name)) !!},
                        datasets: [{
                            data: {!! json_encode($expenseCategories->values()) !!},
                            backgroundColor: ['#F44336', '#FF9800', '#3F51B5', '#009688', '#8BC34A']
                        }]
                    }
                });
            </script>
        @endpush
</x-app-layout>
