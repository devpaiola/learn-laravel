<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Topic;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/topics', function (Request $request) {
    // Retorna apenas as tarefas do usuário dono do token
    return $request->user()->topics;
});