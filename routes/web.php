<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/materiales', [MaterialController::class, 'index']);

Route::post('/materiales', [MaterialController::class, 'store']);

Route::put('/materiales/{material}', [MaterialController::class, 'update']);
