<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Download Monthly Transaction Report</h2>

        <form action="{{ route('transactions.statement.pdf_generate') }}" target="_blank" method="POST">
            @csrf
            <label for="month" class="block text-sm font-medium text-gray-700">Select Month:</label>
            <select id="month" name="month" class="mt-2 block w-full p-2 border rounded-lg">
                @foreach ($months as $month)
                    <option value="{{ $month->month }}">{{ date('F Y', strtotime($month->month . '-01')) }}</option>
                @endforeach
            </select>

            <button type="submit" class="mt-4 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg">
                Generate PDF
            </button>
        </form>
    </div>
</x-app-layout>
