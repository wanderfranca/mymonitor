<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CapturaController;
use App\Http\Controllers\Api\V1\LogController;

Route::prefix('V1')->group(function () {
    Route::get('/capturas',[CapturaController::class, 'index']);
    Route::get('/logs',[LogController::class, 'index']);
    Route::get('/capturas/{capturas}',[CapturaController::class, 'show']);
    // Route::post('/capturas',[CapturaController::class, 'store']);
    
    
    // POST LOG PARA GERAR OS LOGS DAS CAPTURAS
    Route::post('/logs',[LogController::class, 'store']);

    // PUT CAPTURAS - PARA GERAR AS ATUALIZAÇÕES EM TEMPO REAL
    Route::put('/capturas/{capturas}',[CapturaController::class, 'update']);
});

