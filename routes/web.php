<?php

use App\Http\Controllers\{
    AddressController,
    TopicController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('topics', TopicController::class);
Route::resource('addresses', AddressController::class);
