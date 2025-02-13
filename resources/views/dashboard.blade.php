<x-app-layout>
    {{-- Greetings --}}
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
        {{-- Transactions --}}
        <div class="mt-4 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">


                <div class="flex rounded-md shadow-xs items-center justify-between mr-1 mb-4">
                    <h2 class="text-2xl">Transactions</h2>
                    <div>
                        <a href="{{ route('dashboard', ['view' => 'daily', 'month' => $selectedMonth, 'year' => $selectedYear]) }}"
                            aria-current="page"
                            class="px-4 py-2 text-sm font-medium text-gray-100 bg-gray-800 border border-gray-700 rounded-s-lg hover:bg-gray-700 hover:text-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-gray-100 "
                            onclick="showDate('daily')">
                            Daily
                        </a>
                        {{-- <a href="{{ route('dashboard', ['view' => 'monthly', 'year' => $selectedYear]) }}"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            Settings
                        </a> --}}
                        <a href="{{ route('dashboard', ['view' => 'monthly', 'year' => $selectedYear]) }}"
                            class="px-4
                            py-2 text-sm font-medium text-gray-100 bg-gray-800 border border-gray-700 rounded-e-lg
                            hover:bg-gray-700 hover:text-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-500
                            focus:text-gray-100">
                            Monthly
                        </a>
                    </div>
                </div>
                @if ($viewType == 'daily')
                    <div>
                        <a href="{{ route('dashboard', ['view' => 'daily', 'month' => $selectedMonth - 1, 'year' => $selectedYear]) }}"
                            class="active">
                            <i class="fa fa-chevron-left text-xl mr-2 w-5 h-5"></i></a>
                        <span class="text-xl">
                            {{ date('F Y', mktime(0, 0, 0, $selectedMonth, 1, $selectedYear)) }}
                        </span>
                        <a
                            href="{{ route('dashboard', ['view' => 'daily', 'month' => $selectedMonth + 1, 'year' => $selectedYear]) }}"><i
                                class="fa fa-chevron-right text-xl ml-2 w-5 h-5"></i></a>
                    </div>
                @endif

                @if ($viewType == 'monthly')
                    <div>
                        <a href="{{ route('dashboard', ['view' => 'monthly', 'year' => $selectedYear - 1]) }}"><i
                                class="fa fa-chevron-left text-xl mr-2 w-5 h-5"></i></a>
                        <span class="text-xl">
                            {{ $selectedYear }}
                        </span>
                        <a href="{{ route('dashboard', ['view' => 'monthly', 'year' => $selectedYear + 1]) }}">
                            <i class="fa fa-chevron-right text-xl ml-2 w-5 h-5"></i></a>
                    </div>
                @endif
                {{-- Transaction Table --}}
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

                <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-300">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                {{-- Shifting heading column for showing date on monthly --}}
                                @if ($viewType == 'monthly')
                                    <th scope="col" id="showDate" class="px-6 py-3 ">Category</th>
                                @else
                                    <th scope="col" id="showDate" class="px-6 py-3 hidden"></th>
                                @endif
                                {{--  --}}
                                <th scope="col" class="px-6 py-3">
                                    Account
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Note
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $date => $dailyTransaction)
                                @php
                                    $dailyTotal = $dailyTransaction->sum('amount');
                                    $dailyExpenseTotal = $dailyTransaction->where('type', 'expense')->sum('amount');
                                    $dailyIncomeTotal = $dailyTransaction->where('type', 'income')->sum('amount');
                                @endphp
                                <tr class="font-semibold text-gray-300 bg-gray-900 border-t">
                                    <td class="px-6 py-4">{{ $date }}</td>
                                    <td></td>
                                    <td></td>
                                    {{-- Add empty column for showing date in monthly --}}
                                    @if ($viewType == 'monthly')
                                        <td class=""></td>
                                    @else
                                        <td class="hidden"></td>
                                    @endif
                                    {{--  --}}
                                    <td class="px-6 py-4 text-emerald-500">
                                        Rs. {{ number_format($dailyIncomeTotal, 2) }} </td>
                                    <td class="px-6 py-4 text-red-500">Rs. {{ number_format($dailyExpenseTotal, 2) }}
                                    </td>
                                    <td></td>
                                    {{-- <td class="px-6 py-3 text-base">Total:</td>
                                        <td class="px-6 py-4">{{ number_format($dailyTotal, 2) }} </td> --}}
                                </tr>

                                @foreach ($dailyTransaction as $transaction)
                                    <tr class="bg-gray-900 border-gray-700   hover:bg-gray-600">
                                        {{-- Show date on monthly --}}
                                        @if ($viewType == 'monthly')
                                            <td class="px-6 py-4">
                                                {{ $transaction->date }}
                                            </td>
                                        @else
                                            <td class="px-6 py-4 hidden">
                                                {{ $transaction->date }}
                                            </td>
                                        @endif
                                        {{--  --}}
                                        <td class="px-6 py-4">
                                            {{ $transaction->category->name ?? 'Transfer' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($transaction->type === 'transfer')
                                                {{ $transaction->account->name }} <i class="fa fa-arrow-right"></i>
                                                {{ $transaction->toAccount->name }}
                                            @else
                                                {{ $transaction->account->name }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $transaction->note ?? '-' }}
                                        </td>
                                        <td></td>
                                        <td class="px-6 py-4">
                                            <span
                                                @if ($transaction->type === 'income') class="text-emerald-500" 
                                            @elseif ($transaction->type === 'expense') 
                                            class="text-red-500" @endif>
                                                Rs. {{ number_format($transaction->amount, 2) }}
                                            </span>
                                        </td>


                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                                class="font-medium text-gray-300">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <td class="px-6 py-4">
                                        No transactions available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
