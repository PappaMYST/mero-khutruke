<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
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
                        'date' => 'required|date',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                $account = Account::find($validatedData['account_id']);

                if ($account->balance < $validatedData['amount']) {
                        return back()->withErrors(['message' => 'Insufficient funds.']);
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
                        'date' => 'required|date',
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
                        'date' => 'required|date',
                        'amount' => 'required|numeric|min:0.01',
                        'note' => 'nullable|string'
                ]);

                $fromAccount = Account::find($validatedData['from_account_id']);
                $toAccount = Account::find($validatedData['to_account_id']);

                if (!$fromAccount || !$toAccount) {
                        return back()->withErrors(['message' => 'Invalid account selection.']);
                }

                if ($fromAccount->balance < $validatedData['amount']) {
                        return back()->withErrors(['message' => 'Insufficient Balance.']);
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
}
