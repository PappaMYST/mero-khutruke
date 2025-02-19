<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
        public function index(Request $request)
        {
                $viewType = $request->input('view', 'daily');

                $selectedMonth = $request->input('month', Carbon::now()->format('m'));
                $selectedYear = $request->input('year', Carbon::now()->format('Y'));

                if ($selectedMonth < 1) {
                        $selectedMonth = 12;
                        $selectedYear -= 1;
                } elseif ($selectedMonth > 12) {
                        $selectedMonth = 1;
                        $selectedYear += 1;
                }


                if ($viewType == 'daily') {
                        $transactions = Transaction::where('user_id', Auth::id())
                                ->whereYear('date', $selectedYear)
                                ->whereMonth('date', $selectedMonth)
                                ->orderBy('date', 'desc')
                                ->get()
                                ->groupBy(function ($transaction) {
                                        return Carbon::parse($transaction->date)->format('m-d');
                                });
                } else {
                        $transactions = Transaction::where('user_id', Auth::id())
                                ->whereYear('date', $selectedYear)
                                ->orderBy('date', 'desc')
                                ->get()
                                ->groupBy(function ($transaction) {
                                        return Carbon::parse($transaction->date)->format('F');
                                });
                }

                $monthlyIncome = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->whereMonth('date', $selectedMonth)
                        ->where('type', 'income')
                        ->sum('amount');

                $monthlyExpense = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->whereMonth('date', $selectedMonth)
                        ->where('type', 'expense')
                        ->sum('amount');

                $monthlyTotal = $monthlyIncome - $monthlyExpense;

                $yearlyIncome = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->where('type', 'income')
                        ->sum('amount');

                $yearlyExpense = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->where('type', 'expense')
                        ->sum('amount');

                $yearlyTotal = $yearlyIncome - $yearlyExpense;

                return view('dashboard', compact('transactions', 'viewType', 'selectedMonth', 'selectedYear', 'monthlyTotal', 'monthlyIncome', 'monthlyExpense', 'yearlyTotal', 'yearlyIncome', 'yearlyExpense'));
        }

        public function charts(Request $request)
        {
                $viewType = $request->input('view', 'daily');

                $selectedMonth = $request->input('month', Carbon::now()->format('m'));
                $selectedYear = $request->input('year', Carbon::now()->format('Y'));

                if ($selectedMonth < 1) {
                        $selectedMonth = 12;
                        $selectedYear -= 1;
                } elseif ($selectedMonth > 12) {
                        $selectedMonth = 1;
                        $selectedYear += 1;
                }

                $transactionQuery = Transaction::where('user_id', Auth::id());

                if ($viewType == 'daily') {
                        $transactionQuery
                                ->whereYear('date', $selectedYear)
                                ->whereMonth('date', $selectedMonth);
                } else {
                        $transactionQuery
                                ->whereYear('date', $selectedYear);
                }

                $transactions = $transactionQuery->orderBy('date', 'desc')->get();

                $incomeCategories = $transactions->where('type', 'income')
                        ->groupBy('category_id')
                        ->map(fn($group) => $group->sum('amount'));

                $expenseCategories = $transactions->where('type', 'expense')
                        ->groupBy('category_id')
                        ->map(fn($group) => $group->sum('amount'));

                $monthlyIncome = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->whereMonth('date', $selectedMonth)
                        ->where('type', 'income')
                        ->sum('amount');

                $monthlyExpense = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->whereMonth('date', $selectedMonth)
                        ->where('type', 'expense')
                        ->sum('amount');

                $monthlyTotal = $monthlyIncome - $monthlyExpense;

                $yearlyIncome = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->where('type', 'income')
                        ->sum('amount');

                $yearlyExpense = Transaction::where('user_id', Auth::id())
                        ->whereYear('date', $selectedYear)
                        ->where('type', 'expense')
                        ->sum('amount');

                $yearlyTotal = $yearlyIncome - $yearlyExpense;

                return view('transactions.charts', compact('viewType', 'selectedMonth', 'selectedYear', 'incomeCategories', 'expenseCategories', 'monthlyTotal', 'monthlyIncome', 'monthlyExpense', 'yearlyTotal', 'yearlyIncome', 'yearlyExpense'));
        }

        //Generate PDF
        // public function generateMonthlyStatement(Request $request)
        // {
        //         $month = $request->input('month', Carbon::now()->month); // Default: current month
        //         $year = $request->input('year', Carbon::now()->year); // Default: current year

        //         // Fetch transactions for the selected month
        //         $transactions = Transaction::where('user_id', Auth::id())
        //                 ->whereMonth('date', $month)
        //                 ->whereYear('date', $year)
        //                 ->orderBy('date', 'asc')
        //                 ->get();

        //         // Calculate income & expense totals
        //         $totalIncome = $transactions->where('type', 'income')->sum('amount');
        //         $totalExpense = $transactions->where('type', 'expense')->sum('amount');

        //         // Generate PDF
        //         $pdf = Pdf::loadView('transactions.statement', compact('transactions', 'totalIncome', 'totalExpense', 'month', 'year'));

        //         // Return PDF for download
        //         return $pdf->download("monthly-statement-$year-$month.pdf");
        //
        public function showMonthlyPDFView()
        {
                // Get distinct months that have transactions
                $months = Transaction::selectRaw("DATE_FORMAT(date, '%Y-%m') as month")
                        ->groupBy('month')
                        ->orderBy('month', 'desc')
                        ->get();

                return view('transactions.statement.pdf', compact('months'));
        }

        public function generateMonthlyPDF(Request $request)
        {
                $request->validate([
                        'month' => 'required|date_format:Y-m',
                ]);

                $selectedMonth = $request->month;

                // Fetch transactions for the selected month
                $transactions = Transaction::whereYear('date', substr($selectedMonth, 0, 4))
                        ->whereMonth('date', substr($selectedMonth, 5, 2))
                        ->orderBy('date', 'asc')
                        ->get();

                // Calculate income & expense totals
                $totalIncome = $transactions->where('type', 'income')->sum('amount');
                $totalExpense = $transactions->where('type', 'expense')->sum('amount');

                $pdf = Pdf::loadView('transactions.statement.pdf_template', compact('transactions', 'selectedMonth', 'totalIncome', 'totalExpense'));

                return $pdf->stream("transactions_{$selectedMonth}.pdf");
        }



        //Show create expense form
        public function createExpense()
        {
                $accounts = Account::where('user_id', Auth::id())->get();
                $categories = Category::where('user_id', Auth::id())->where('type', 'expense')->get();
                return view('transactions.create_expense', compact('accounts', 'categories'));
        }

        //Show create income form
        public function createIncome()
        {
                $accounts = Account::where('user_id', Auth::id())->get();
                $categories = Category::where('user_id', Auth::id())->where('type', 'income')->get();
                return view('transactions.create_income', compact('accounts', 'categories'));
        }

        //Show create transfer form
        public function createTransfer()
        {
                $accounts = Account::where('user_id', Auth::id())->get();
                return view('transactions.create_transfer', compact('accounts'));
        }

        //Store expense
        public function storeExpense(Request $request)
        {
                $validatedData = $request->validate([
                        'account_id' => 'required|exists:accounts,id',
                        'category_id' => 'required|exists:categories,id',
                        'date' => 'required|date|before_or_equal:today',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                $account = Account::find($validatedData['account_id']);

                if ($account->balance < $validatedData['amount']) {
                        return back()->with('error', 'Insufficient funds.');
                }

                $account->balance -= $validatedData['amount'];
                $account->save();

                Transaction::create([
                        'user_id' => Auth::id(),
                        'account_id' => $validatedData['account_id'],
                        'category_id' => $validatedData['category_id'],
                        'type' => 'expense',
                        'amount' => $validatedData['amount'],
                        'date' => $validatedData['date'],
                        'note' => $validatedData['note'],
                ]);

                return redirect()->route('dashboard')->with('success', 'Expense recored successfully.');

        }

        //Store income
        public function storeIncome(Request $request)
        {
                $validatedData = $request->validate([
                        'account_id' => 'required|exists:accounts,id',
                        'category_id' => 'required|exists:categories,id',
                        'date' => 'required|date|before_or_equal:today',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                $account = Account::find($validatedData['account_id']);

                $account->balance += $validatedData['amount'];
                $account->save();

                Transaction::create([
                        'user_id' => Auth::id(),
                        'account_id' => $validatedData['account_id'],
                        'category_id' => $validatedData['category_id'],
                        'type' => 'income',
                        'amount' => $validatedData['amount'],
                        'date' => $validatedData['date'],
                        'note' => $validatedData['note'],
                ]);

                return redirect()->route('dashboard')->with('success', 'Income recored successfully.');

        }

        //Store transfer
        public function storeTransfer(Request $request)
        {
                $validatedData = $request->validate([
                        'from_account_id' => 'required|exists:accounts,id|different:to_account_id',
                        'to_account_id' => 'required|exists:accounts,id',
                        'date' => 'required|date|',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                $fromAccount = Account::find($validatedData['from_account_id']);
                $toAccount = Account::find($validatedData['to_account_id']);

                if (!$fromAccount || !$toAccount) {
                        return back()->with('error', 'Invalid account selection.');
                }

                if ($fromAccount->balance < $validatedData['amount']) {
                        return back()->with('error', 'Insufficient balance.');
                }

                $fromAccount->balance -= $validatedData['amount'];
                $toAccount->balance += $validatedData['amount'];

                $fromAccount->save();
                $toAccount->save();

                Transaction::create([
                        'user_id' => Auth::user()->id,
                        'account_id' => $validatedData['from_account_id'],
                        'type' => 'transfer',
                        'amount' => $validatedData['amount'],
                        'date' => $validatedData['date'],
                        'note' => $validatedData['note'],
                        'to_account_id' => $validatedData['to_account_id']
                ]);


                return redirect()->route('dashboard')->with('success', 'Balance transferred successfully.');
                // dd('Balance transferred successfully.');
        }

        //Edit Transaction
        public function edit($id)
        {
                $transaction = Transaction::findOrFail($id);
                $categories = Category::all()->where('user_id', Auth::id());
                $accounts = Account::all()->where('user_id', Auth::id());

                if ($transaction->type === 'transfer') {
                        return view('transactions.edit-transfer', compact('transaction', 'categories', 'accounts'));
                } else {
                        return view('transactions.edit-income-expense', compact('transaction', 'categories', 'accounts'));
                }
        }

        //Update Transaction
        public function update(Request $request, $id)
        {

                $transaction = Transaction::findOrFail($id);
                $account = Account::findOrFail($transaction->account_id);

                $request->validate([
                        'date' => 'required|date|before_or_equal:today',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                if ($transaction->type === 'transfer') {
                        $request->validate([
                                'from_account_id' => 'required|exists:accounts,id|different:to_account_id',
                                'to_account_id' => 'required|exists:accounts,id'
                        ]);

                        $fromAccount = Account::find($request->from_account_id);
                        $toAccount = Account::find($request->to_account_id);

                        //Rollback previous amount
                        $fromAccount->balance += $transaction->amount;
                        $toAccount->balance -= $transaction->amount;

                        if (!$fromAccount || !$toAccount) {
                                return back()->with('error', 'Invalid account selection.');
                        }

                        if ($fromAccount->balance < $request->amount) {
                                return back()->with('error', 'Insufficient balance.');
                        }

                        $fromAccount->balance -= $request->amount;
                        $toAccount->balance += $request->amount;

                        $fromAccount->save();
                        $toAccount->save();

                        $transaction->update([
                                'account_id' => $request->from_account_id,
                                'amount' => $request->amount,
                                'date' => $request->date,
                                'note' => $request->note,
                                'to_account_id' => $request->to_account_id
                        ]);

                } else {
                        $request->validate([
                                'category_id' => 'required|exists:categories,id',
                                'account_id' => 'required|exists:accounts,id'
                        ]);

                        if ($transaction->type === 'income') {
                                $account->balance -= $transaction->amount;

                        } elseif ($transaction->type === 'expense') {
                                $account->balance += $transaction->amount;

                                if ($account->balance < $request->amount) {
                                        return back()->with('error', 'Insufficient balance.');
                                }
                        }

                        $transaction->update([
                                'account_id' => $request->account_id,
                                'category_id' => $request->category_id,
                                'amount' => $request->amount,
                                'date' => $request->date,
                                'note' => $request->note,
                        ]);

                        if ($transaction->type === 'income') {
                                $account->balance += $request->amount;

                        } elseif ($transaction->type === 'expense') {
                                $account->balance -= $request->amount;

                                if ($account->balance < $request->amount) {
                                        return back()->with('error', 'Insufficient funds.');
                                }
                        }

                        $account->save();
                }

                return redirect()->route('dashboard')->with('success', 'Transaction updated successfully. Account fund has been rollbacked.');
        }

        //Delete Transaction
        public function destroy($id)
        {
                $transaction = Transaction::findOrFail($id);
                $account = Account::find($transaction->account_id);

                if ($transaction->type === 'income') {
                        $account->balance -= $transaction->amount;

                        $account->save();
                } elseif ($transaction->type === 'expense') {
                        $account->balance += $transaction->amount;

                        $account->save();
                } elseif ($transaction->type === 'transfer') {
                        $fromAccount = Account::find($transaction->from_account_id);
                        $toAccount = Account::find($transaction->to_account_id);

                        $fromAccount->balance += $transaction->amount;
                        $toAccount->balance -= $transaction->amount;

                        $fromAccount->save();
                        $toAccount->save();

                }

                $transaction->delete();

                return redirect()->route('dashboard')->with('success', 'Transaction deleted successfully.');
        }
}
