<?php   use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'store']);
