<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategoritoko',[KategoriController::class,'index']);