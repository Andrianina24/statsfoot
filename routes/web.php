<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatsController;


Route::get('/', [StatsController::class, 'getGeneral']);
Route::get('/general', [StatsController::class, 'getGeneral']);
Route::get('/attaque', [StatsController::class, 'getAttaque']);
Route::get('/defense', [StatsController::class, 'getDefense']);

Route::get('/general/{path}', [StatsController::class, 'getByPathGen'])->where('path', 'general|domicile|exterieur');
Route::get('/attaque/{path}', [StatsController::class, 'getByPathAtt'])->where('path', 'general|domicile|exterieur');
Route::get('/defense/{path}', [StatsController::class, 'getByPathDef'])->where('path', 'general|domicile|exterieur');
