<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetilController;
use App\Http\Controllers\SubDetilController;

Route::get('/', function () {
    return view('detils.index');
});

Route::get('/sub_detils', [SubDetilController::class, 'index']);

Route::resource('detils', DetilController::class); // Menambahkan resource route untuk detils
Route::resource('sub_detils', SubDetilController::class); // Menambahkan resource route untuk detils
