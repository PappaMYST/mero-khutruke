<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700" rel="stylesheet" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Monthly Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h2>Transactions for {{ date('F Y', strtotime($selectedMonth . '-01')) }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Category</th>
                <th>Account</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ date('d M, Y', strtotime($transaction->date)) }}</td>
                    <td>{{ $transaction->category->name ?? 'Transfer' }}</td>
                    <td>
                        @if ($transaction->type === 'transfer')
                            {{ $transaction->account->name }} to
                            {{ $transaction->toAccount->name }}
                        @else
                            {{ $transaction->account->name }}
                        @endif
                    </td>
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
