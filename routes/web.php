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

// Fundamental patterns
Route::get('/fundamentals/property-container', [App\Http\Controllers\FundamentalPatternsController::class, 'PropertyContainer'])->name('property-container');
Route::get('/fundamentals/delegation', [App\Http\Controllers\FundamentalPatternsController::class, 'Delegation'])->name('delegation');
Route::get('/fundamentals/event-channel', [App\Http\Controllers\FundamentalPatternsController::class, 'EventChannel'])->name('event-channel');

// Creational patterns
Route::get('/creational/abstract-factory', [App\Http\Controllers\CreationalPatternsController::class, 'AbstractFactory'])->name('abstract-factory');
Route::get('/creational/factory-method', [App\Http\Controllers\CreationalPatternsController::class, 'FactoryMethod'])->name('factory-method');
Route::get('/creational/static-factory', [App\Http\Controllers\CreationalPatternsController::class, 'StaticFactory'])->name('static-factory');
Route::get('/creational/simple-factory', [App\Http\Controllers\CreationalPatternsController::class, 'SimpleFactory'])->name('simple-factory');
Route::get('/creational/singleton', [App\Http\Controllers\CreationalPatternsController::class, 'Singleton'])->name('singleton');
Route::get('/creational/multiton', [App\Http\Controllers\CreationalPatternsController::class, 'Multiton'])->name('multiton');
Route::get('/creational/builder', [App\Http\Controllers\CreationalPatternsController::class, 'Builder'])->name('builder');
Route::get('/creational/lazy-initialization', [App\Http\Controllers\CreationalPatternsController::class, 'LazyInitialization'])->name('lazy-initialization');
