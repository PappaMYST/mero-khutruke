<!DOCTYPE html>
<html>

<head>
    <title>Monthly Statement - {{ \Carbon\Carbon::create()->month($month)->format('F') }} {{ $year }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>

    <h2>Monthly Transaction Statement</h2>
    <p>Month: {{ \Carbon\Carbon::create()->month($month)->format('F') }} {{ $year }}</p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>{{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total Income: {{ number_format($totalIncome, 2) }}</h3>
    <h3>Total Expense: {{ number_format($totalExpense, 2) }}</h3>
    <h3>Net Balance: {{ number_format($totalIncome - $totalExpense, 2) }}</h3>

</body>

</html>
