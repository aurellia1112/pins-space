<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentsController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [PinController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PIN
    |--------------------------------------------------------------------------
    */

    // Halaman tambah pin
    Route::get('/pins/create', [PinController::class, 'create'])
        ->name('pins.create');

    // Simpan pin
    Route::post('/pins', [PinController::class, 'store'])
        ->name('pins.store');

    // Hapus pin
    Route::delete('/pins/{pin}', [PinController::class, 'destroy'])
        ->name('pins.destroy');


    /*
    |--------------------------------------------------------------------------
    | LIKE
    |--------------------------------------------------------------------------
    */

    // Like / Unlike pin
    Route::post('/pins/{pin}/like', [LikeController::class, 'toggle'])
        ->name('pins.like');


    /*
    |--------------------------------------------------------------------------
    | COMMENT
    |--------------------------------------------------------------------------
    */

    // Tambah komentar
    Route::post('/pins/{pin}/comments', [CommentsController::class, 'store'])
        ->name('comments.store');

    // Hapus komentar
    Route::delete('/comments/{comments}', [CommentsController::class, 'destroy'])
        ->name('comments.destroy');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';