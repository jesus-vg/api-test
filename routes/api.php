<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/**
 * Rutas para el manejo de usuarios.
 * para model binding se usa {user} en vez de {id}
 *         /users/delete/{user}         url backend
 *         /users/delete/{id}              url frontend
 */
Route::controller( UserController::class )->group( function () {
    Route::post( '/users/new', 'store' );
    Route::delete( '/users/delete/{user}', 'destroy' );
    Route::put( '/users/update/{user}', 'update' );
    Route::get( '/users/{user}', 'show' );
    Route::get( '/users', 'index' );
} );
