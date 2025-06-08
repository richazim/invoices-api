<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ...

Route::get('login', function(){
    $access_token = User::firstOrFail()
        ->createToken('auth_token')
        ->plainTextToken;

    return response()
        ->json([
            'token_type' => 'Bearer',
            'access_token' => $access_token
        ]);
})->name('login');