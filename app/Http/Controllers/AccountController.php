<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::where('user_id', Auth::id())
            ->orWhereNull('user_id')
            ->get();

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0.01'
        ]);

        Account::create([
            'name' => $validatedData['name'],
            'balance' => $validatedData['balance'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0'
        ]);

        $oldBalance = $account->balance;
        $newBalance = $request->balance;

        $account->update([
            'name' => $validatedData['name'],
            'balance' => $newBalance
        ]);

        if ($newBalance < $oldBalance) {
            Transaction::create([
                'user_id' => Auth::id(),
                'account_id' => $account->id,
                'category_id' => null,
                'amount' => $oldBalance - $newBalance,
                'type' => 'expense',
                'date' => now(),
                'note' => 'Balance Modified'

            ]);
        } elseif ($newBalance > $oldBalance) {
            Transaction::create([
                'user_id' => Auth::id(),
                'account_id' => $account->id,
                'category_id' => null,
                'amount' => $newBalance - $oldBalance,
                'type' => 'income',
                'date' => now(),
                'note' => 'Balance Modified'

            ]);
        }

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
