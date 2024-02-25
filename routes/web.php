<?php

use App\Http\Controllers\FundIdController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

// Route for setting the fund_id and redirecting to login
Route::get('/fund-id', [FundIdController::class, 'setFundId'])->name('fund.id.set');

// Route that requires fund_id in session, otherwise redirects to get-fund-id
Route::middleware('fund.id')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login.show');
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/login/google', [GoogleAuthController::class, 'redirectToGoogle'])
        ->name('login.google');
    Route::get('/login/authcallback', [GoogleAuthController::class, 'handleGoogleCallback'])
        ->name('login.google.authcallback');
});

// Route to get fund_id (should show a form or some method to set fund_id)
Route::get('/get-fund-id', function () {
    return view('get-fund-id');
})->name('fund.id.get');
