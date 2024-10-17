<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user}/message', function (User $user) {
    return view('user.message', [
        'user' => $user,
    ]);
});

Route::get('/user/{user}/appointment', function (User $user) {
    return view('user.appointment', [
        'user' => $user,
    ]);
});


require __DIR__ . '/auth.php';
