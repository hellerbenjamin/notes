<?php

use App\Http\Controllers\Notes\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('notes', [NotesController::class, 'index']);
    Route::get('notes/{id}', [NotesController::class, 'show'])->middleware('note.owner');
    Route::post('notes', [NotesController::class, 'store']);
    Route::put('notes/{id}', [NotesController::class, 'update'])->middleware('note.owner');;
    Route::delete('notes/{id}', [NotesController::class, 'destroy'])->middleware('note.owner');;
});

