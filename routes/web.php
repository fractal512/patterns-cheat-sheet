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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fundamentals/property-container', [App\Http\Controllers\FundamentalPatternsController::class, 'PropertyContainer'])->name('property-container');
Route::get('/fundamentals/delegation', [App\Http\Controllers\FundamentalPatternsController::class, 'Delegation'])->name('delegation');
Route::get('/fundamentals/event-channel', [App\Http\Controllers\FundamentalPatternsController::class, 'EventChannel'])->name('event-channel');
