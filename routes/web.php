<?php

use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(StateController::class)->group(function() {
    Route::get('', 'index');
    Route::get('municipios-por-estado/{stateName}', 'townsByState')->name('towns.name');
});
