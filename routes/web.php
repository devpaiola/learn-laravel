<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesafioController;

Route::get('/', [DesafioController::class, 'index']);
