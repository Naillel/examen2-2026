<?php   use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'store']);
Route::put('/materiales/{id}', [MaterialController::class, 'update']);
