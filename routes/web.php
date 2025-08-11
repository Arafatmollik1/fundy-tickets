<?php

use App\Http\Controllers\FundEventController;
use App\Http\Controllers\FundIdController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentRecipientInfoController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\FundraisingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('fund.id.get');
});

// Route for setting the fund_id and redirecting to login
Route::get('/fund-id', [FundIdController::class, 'setFundId'])->name('fund.id.set');

// Route to get fund_id (should show a form or some method to set fund_id)
Route::get('/get-fund-id', function () {
    return view('get-fund-id');
})->name('fund.id.get');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::get('/login/google', [GoogleAuthController::class, 'redirectToGoogle'])
    ->name('login.google');
Route::get('/login/authcallback', [GoogleAuthController::class, 'handleGoogleCallback'])
    ->name('login.google.authcallback');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    /*
 |----------------------------------
 | Routes under super
 |----------------------------------
 */
    Route::prefix('super')->group(function () {
        Route::get('/dashboard', [SuperController::class, 'index'])
            ->name('super.dashboard');
        Route::get('/fund-event', [FundEventController::class, 'index'])->name('super.fund-event.index');
        Route::post('/fund-event', [FundEventController::class, 'store'])->name('super.fund-event.store');
        Route::get('/event-info/{fund_id}', [SuperController::class, 'showEventInfoById'])
            ->name('super.event.show');
        Route::get('/event-info/payments/{fund_id}', [SuperController::class, 'showEventPaymentInfoById'])
            ->name('super.event.payments');
        Route::delete('/event-info/{fund_id}', [SuperController::class, 'deleteEventInfoById'])
            ->name('super.event.remove');
        Route::post('/event-info/search-payments', [SuperController::class, 'showEventPaymentInfoByIdAndName'])
            ->name('super.event.search.payments');
        Route::get('/payment-recipient-info/create', [PaymentRecipientInfoController::class, 'create'])->name('payment-recipient-info.create');
        Route::post('/payment-recipient-info', [PaymentRecipientInfoController::class, 'store'])->name('payment-recipient-info.store');
    });
});

// Route that requires fund_id in session, otherwise redirects to get-fund-id
Route::middleware('fund.id')->group(function () {
    Route::get('/fundraising/{fund_id}', [FundraisingController::class, 'showByFundId'])
        ->name('fundraising.showByFundId');
    Route::get('/fundraising/{fund_id}/donations', [PaymentController::class, 'showPayByFundId'])
        ->name('fundraising.showPayByFundId');
    Route::post('/fundraising/{fund_id}/set-donations', [PaymentController::class, 'setPayment'])
        ->name('fundraising.donations.set');
});
Route::post('/fundraising/{id}/status' , [PaymentController::class, 'updateStatus']);
