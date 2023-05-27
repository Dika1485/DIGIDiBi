<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index1');
});
Route::get('dashboard', function () {
    return view('index');
});
Route::get('dashboard/packagetype', function () {
    return view('packagetype');
});
Route::get('dashboard/order', function () {
    return view('order');
});
Route::get('dashboard/history', function () {
    return view('history');
});
Route::get('/daftar', [WebController::class, 'index']);
Route::get('/payment', [WebController::class, 'payment']);
Route::post('/payment', [WebController::class, 'payment_post']);
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
