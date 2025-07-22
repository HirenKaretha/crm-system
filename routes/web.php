<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ConversationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('messages', [MessageController::class, 'create'])->name('messages.create');
Route::post('messages', [MessageController::class, 'send'])->name('messages.send');

Route::post('/customers/{customer}/send-message', [CustomerController::class, 'sendMessage'])->name('customers.sendMessage');
Route::post('/customers/send-message-all', [CustomerController::class, 'sendMessageAll'])->name('customers.sendMessageAll');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('customers', CustomerController::class);
    Route::resource('conversations', ConversationController::class);

});

Route::get('customers/{customer}/conversations/create', [ConversationController::class, 'create'])->name('conversations.create');
Route::post('customers/{customer}/conversations', [ConversationController::class, 'store'])->name('conversations.store');
Route::post('/customers/send-message', [CustomerController::class, 'sendBulkMessage'])->name('customers.sendBulkMessage');

require __DIR__.'/auth.php';