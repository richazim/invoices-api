<?php

use App\Http\Controllers\Api\Invoice\IndexController;
use App\Http\Controllers\Api\Invoice\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('invoices')
    ->as('invoices.')
    ->middleware('auth:sanctum')
    ->group(static function (): void {
        Route::get('/', IndexController::class)
            ->name('index');

        Route::post('/store', StoreController::class)
            ->name('store');
    }); 