<?php

use App\Http\Controllers\Website\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'homepage' => HomepageController::class,
]);
