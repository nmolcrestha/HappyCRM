<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MessageController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user}/message', [MessageController::class, 'show']);
Route::post('/user/{user}/message', [MessageController::class, 'submit'])->name('message.submit');

Route::get('/user/{user}/appointment', [AppointmentController::class, 'show']);
Route::post('/user/{user}/appointment', [AppointmentController::class, 'submit'])->name('appointment.submit');


require __DIR__ . '/auth.php';
