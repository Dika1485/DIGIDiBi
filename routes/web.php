<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SewaController;
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
    return redirect(url('/dashboard'));
});
// Route::get('dashboard', function () {
//     return view('index');
// });
//Route::get('dashboard/packagetype', function () {
//    return view('packagetype');
//});
// Route::get('login', function () {
//     return view('login');
// });
// Route::get('register', function () {
//     return view('register');
// });
Route::get('/forgot-password', function () {
    return view('forgot-password');
});

// Route::get('dashboard/packagetype/update', function () {
//     return view('updatepackagetype');
// });
//Route::get('dashboard/order', function () {
//    return view('order');
//});
//Route::get('dashboard/history', function () {
//    return view('history');
//});
// Route::get('/daftar', [WebController::class, 'index']);
// Route::get('/payment', [SewaController::class, 'payment']);
// Route::post('/payment', [SewaController::class, 'payment_post']);
// Route::get('/check', function () {
//     return view('check');
// });
Route::get('/check', [ProgresController::class, 'check']);
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [SewaController::class, 'payment']);
    Route::post('/dashboard', [SewaController::class, 'payment_post']);
    Route::get('/dashboard/profile', function () {
        return view('profile');
    });
    Route::get('/dashboard/packagetype/create', function () {
        return view('createpackagetype');
    });
    Route::post('/dashboard/packagetype/create', [PaketController::class, 'create']);
    Route::get('/dashboard/order/create', [PesananController::class, 'read_packagetype']);
    Route::post('/dashboard/order/create', [PesananController::class, 'create']);
    Route::get('/dashboard/users/create', function () {
        return view('createuser');
    });
    Route::get('/dashboard/rent/create', function () {
        return view('createrent');
    });
    Route::get('/dashboard/order/update', function () {
        return view('updateorder');
    });
    Route::get('/dashboard/users/update', function () {
        return view('updateuser');
    });
    Route::get('/dashboard/rent/update', function () {
        return view('updaterent');
    });
    Route::get('/dashboard/profile/edit', function () {
        return view('editprofile');
    });
    Route::get('/dashboard/profile/editpassword', function () {
        return view('editpassword');
    });
    Route::post('/dashboard/profile/edit', [UserController::class, 'update']);
    Route::post('/dashboard/profile/editpassword', [UserController::class, 'updatepassword']);
    Route::get('/dashboard/packagetype/edit', [PaketController::class, 'read_id']);
    Route::post('/dashboard/packagetype/edit', [PaketController::class, 'update']);
    Route::get('/dashboard/packagetype', [PaketController::class, 'read']);
    Route::post('/dashboard/packagetype', [PaketController::class, 'delete']);
    Route::get('/dashboard/order', [PesananController::class, 'read']);
    Route::post('/dashboard/order', [ProgresController::class, 'update']);
    Route::get('/dashboard/history', [PesananController::class, 'read_history']);
    Route::get('/dashboard/users', [UserController::class, 'read']);
    Route::get('/dashboard/rent', [SewaController::class, 'read']);
});
