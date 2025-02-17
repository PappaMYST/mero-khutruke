<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:255',
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:255',
            'balance' => 'required|numeric|min:0'
        ]);

        $account->update([
            'name' => $validatedData['name'],
            'balance' => $validatedData['balance']
        ]);

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
