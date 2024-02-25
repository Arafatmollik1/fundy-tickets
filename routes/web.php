<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;
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

Route::get('/login', [LoginController::class, 'index'])
    ->name('login.show');

Route::get('/test-db', function () {
    try {
        $databaseTest = DB::select('SELECT NOW() as now'); // For MySQL

        // For other databases, you might need to adjust the SQL query accordingly.
        return response()->json(['success' => true, 'time' => $databaseTest[0]->now]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
});
