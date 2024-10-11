<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('/checklists', [ChecklistController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    // Checklist API
    Route::get('/checklists', [ChecklistController::class, 'index']);
    Route::delete('/checklists/{id}', [ChecklistController::class, 'destroy']);

    // Checklist Items API
    Route::get('/checklists/{checklistId}/items', [ChecklistItemController::class, 'index']);
    Route::post('/checklists/{checklistId}/items', [ChecklistItemController::class, 'store']);
    Route::put('/checklists/{checklistId}/items/{itemId}', [ChecklistItemController::class, 'update']);
    Route::delete('/checklists/{checklistId}/items/{itemId}', [ChecklistItemController::class, 'destroy']);

    Route::post('logout', [AuthController::class, 'logout']);
});
