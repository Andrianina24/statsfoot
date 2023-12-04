<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\StatsController;

Route::get('/', [StatsController::class, 'getGeneral']);
Route::get('/general', [StatsController::class, 'getGeneral']);
Route::get('/attaque', [StatsController::class, 'getAttaque']);
Route::get('/defense', [StatsController::class, 'getDefense']);

Route::get('/general/{path}', [StatsController::class, 'getByPathGen'])->where('path', 'general|domicile|exterieur');
Route::get('/attaque/{path}', [StatsController::class, 'getByPathAtt'])->where('path', 'general|domicile|exterieur');
Route::get('/defense/{path}', [StatsController::class, 'getByPathDef'])->where('path', 'general|domicile|exterieur');
