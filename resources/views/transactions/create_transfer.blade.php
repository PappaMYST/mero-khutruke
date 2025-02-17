<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-200">
                <h2 class="text-2xl mb-5">Create Transfer</h2>

                <form method="post" action="{{ route('transactions.transfer_store') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-200">Date</label>
                        <div class="relative max-w-sm">
                            {{-- <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div> --}}
                            {{-- <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date"> --}}

                            <input type="date" name="date" id="date"
                                class="bg-gray-700 border border-gray-600  text-sm placeholder-gray-400 rounded-lg focus:border-blue-500 block w-full ps-10 p-2.5 text-gray-200 focus:ring-blue-500">

                            @error('date')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5">
                        <fieldset>
                            <label for="from_account_id"
                                class="block mb-2 text-sm font-medium text-gray-200">From</label>
                            <select id="from_account_id" name="from_account_id"
                                class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-200">
                                <option disabled selected value="">Select an option</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }}
                                    </option>
                                @endforeach
                            </select>
                            @error('from_account_id')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="mb-5">
                        <fieldset>
                            <label for="to_account_id" class="block mb-2 text-sm font-medium text-gray-200">To</label>
                            <select id="to_account_id" name="to_account_id"
                                class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-200">
                                <option disabled selected value="">Select an option</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }}
                                    </option>
                                @endforeach
                            </select>
                            @error('to_account_id')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="mb-5">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-200">Amount</label>
                        <input type="number" id="amount" name="amount" min="0.01" step="0.01"
                            class="border text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light" />
                        @error('amount')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="note" class="block mb-2 text-sm font-medium text-gray-200">Note</label>
                        <input type="text" id="note" name="note"
                            class="border text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light" />
                    </div>

                    <x-primary-button type="submit">Transfer</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
