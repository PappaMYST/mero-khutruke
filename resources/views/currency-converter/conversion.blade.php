<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-200">
                <h2 class="text-2xl mb-5">Currency Convertor</h2>
                <div class="mb-5">
                    <fieldset>
                        <label for="currencies" class="block mb-2 text-sm font-medium text-gray-200">Desired
                            Currency</label>
                        <select id="currencies" name="currencies"
                            class=" border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-200 focus:ring-blue-500 focus:border-blue-500">
                            <option disabled selected value="">Select an option</option>
                            <option name="currencies" id="currencies" onchange="convertCurrency()"></option>
                        </select>
                    </fieldset>
                </div>

                <div class="mb-5">
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-200">Amount (in Rs.)</label>
                    <input type="number" id="amount" name="amount"
                        class="border text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                        oninput="convertCurrency()" />
                </div>

                <div class="mb-5">
                    <label for="converted" class="block mb-2 text-sm font-medium text-gray-200">Converted
                        Currency</label>
                    <input type="text" id="converted" name="converted"
                        class="border text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 shadow-xs-light"
                        readonly />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let exchangeRates = {};

            async function fetchCurrencies() {
                try {
                    let response = await fetch(`https://api.exchangerate-api.com/v4/latest/NPR`);
                    let data = await response.json();

                    exchangeRates = data.rates; // Store rates globally

                    let currencySelect = document.getElementById("currencies");
                    currencySelect.innerHTML = ""; // Clear existing options

                    // Populate dropdown with available currencies
                    Object.keys(exchangeRates).forEach(currency => {
                        let option = document.createElement("option");
                        option.value = currency;
                        option.textContent = currency;
                        currencySelect.appendChild(option);
                    });

                    // Set default conversion
                    convertCurrency();
                } catch (error) {
                    console.error("Error fetching currencies:", error);
                }
            }

            function convertCurrency() {
                let amount = document.getElementById("amount").value;
                let currency = document.getElementById("currencies").value;

                if (!amount || isNaN(amount)) {
                    document.getElementById("converted").value = "";
                    return;
                }

                let convertedAmount = amount * (exchangeRates[currency] || 0);
                document.getElementById("converted").value = convertedAmount.toFixed(2);
            }

            // Load currency options on page load
            window.onload = fetchCurrencies;
        </script>
    @endpush
</x-app-layout>
