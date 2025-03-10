<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
