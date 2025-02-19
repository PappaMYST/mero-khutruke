<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Mail\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

//Landing page route
Route::get('/', function () {
    return view('layouts.landing');
});

//Contact Us Form
Route::post('/', [ContactController::class, 'contactSubmit'])->name('contact.submitForm');

Route::middleware(['auth', 'verified'])->group(function () {
    //Profile 'preconfigured'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Category
    Route::resource('categories', CategoryController::class);

    //Account
    Route::resource('accounts', AccountController::class);

    //Transaction
    //Dashboard route where all transaction are shown
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
    Route::get('/statistics', [TransactionController::class, 'charts'])->name('transactions.charts');

    Route::get('/transactions/expense/create', [TransactionController::class, 'createExpense'])->name('transactions.create_expense');
    Route::get('/transactions/income/create', [TransactionController::class, 'createIncome'])->name('transactions.create_income');
    Route::get('/transactions/transfer/create', [TransactionController::class, 'createTransfer'])->name('transactions.create_transfer');

    Route::post('/transaction/expense', [TransactionController::class, 'storeExpense'])->name('transactions.expense_store');
    Route::post('/transaction/income', [TransactionController::class, 'storeIncome'])->name('transactions.income_store');
    Route::post('/transaction/transfer', [TransactionController::class, 'storeTransfer'])->name('transactions.transfer_store');

    Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::get('/transaction/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

    Route::get('/transactions/pdf', [TransactionController::class, 'showMonthlyPDFView'])->name('transactions.statement.pdf_view');
    Route::post('/transactions/pdf/generate', [TransactionController::class, 'generateMonthlyPDF'])->name('transactions.statement.pdf_generate');


    //Currency Converter
    Route::get('/currency-converter', function () {
        return view('currency-converter.conversion');
    })->name('currency-converter.conversion');
});

//Email Verification Route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__ . '/auth.php';
