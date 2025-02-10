<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $viewType = $request->input('view', 'daily');

        $selectedMonth = $request->input('month', Carbon::now()->format('m'));
        $selectedYear = $request->input('year', Carbon::now()->format('Y'));


        if ($viewType == 'daily') {
            $transactions = Transaction::where('user_id', Auth::id())
                ->whereYear('date', $selectedYear)
                ->whereMonth('date', $selectedMonth)
                ->orderBy('date', 'desc')
                ->get()
                ->groupBy(function ($transaction) {
                    return Carbon::parse($transaction->date)->format('Y-m-d');
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
}
