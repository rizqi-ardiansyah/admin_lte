<?php

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\TechnicianController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Auth::routes();

Route::prefix('customer/')->group(function(){
    Route::post('create', [CustomerController::class, 'createCust'])->name('create.cust');
    Route::get('list', [CustomerController::class, 'showAll'])->name('show.all');
    Route::get('{id}/detail', [CustomerController::class, 'showCust'])->name('show.cust');
    Route::delete('{id}/delete', [CustomerController::class, 'destroy'])->name('delete.cust');
    Route::put('{id}/update', [CustomerController::class, 'updateCust'])->name('update.cust');
    Route::get('{id}/order', [CustomerController::class, 'updateTrans'])->name('update.order');
});

Route::prefix('technician/')->group(function(){
    Route::get('list', [TechnicianController::class, 'showAll'])->name('show.all.tech');
    Route::get('{id}/detail', [TechnicianController::class, 'showTech'])->name('show.tech');
    Route::delete('{id}/delete', [TechnicianController::class, 'destroy'])->name('delete.tech');
    Route::put('{id}/update', [TechnicianController::class, 'updateTech'])->name('update.tech');
});

Route::prefix('transaction/')->group(function(){
    Route::post('create', [TransactionController::class, 'createTrans'])->name('create.trans');
    Route::get('list', [TransactionController::class, 'showAll'])->name('show.all.trans');
    Route::get('{id}/detail', [TransactionController::class, 'showTrans'])->name('show.trans');
    Route::delete('{id}/delete', [TransactionController::class, 'destroy'])->name('delete.trans');
    Route::put('{id}/update', [TransactionController::class, 'updateTrans'])->name('update.trans');
    Route::get('{id}/order', [TransactionController::class, 'checkOrder'])->name('order.check');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});