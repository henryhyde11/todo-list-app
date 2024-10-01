<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/{note}/edit', [NoteController::class, 'edit']);
Route::put('/notes/{note}', [NoteController::class, 'update']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/notes', [NoteController::class, 'index']);
//     Route::post('/notes', [NoteController::class, 'store']);
//     Route::get('/notes/{id}', [NoteController::class, 'show']);
//     Route::put('/notes/{id}', [NoteController::class, 'update']);
//     Route::delete('/notes/{id}', [NoteController::class, 'destroy']);

//     Route::get('/categories', [CategoryController::class, 'index']);
//     Route::post('/categories', [CategoryController::class, 'store']);
//     Route::get('/categories/{id}', [CategoryController::class, 'show']);
//     Route::put('/categories/{id}', [CategoryController::class, 'update']);
//     Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
// });