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
Route::get('/creational/prototype', [App\Http\Controllers\CreationalPatternsController::class, 'Prototype'])->name('prototype');
Route::get('/creational/object-pool', [App\Http\Controllers\CreationalPatternsController::class, 'ObjectPool'])->name('object-pool');

// Structural patterns
Route::get('/structural/adapter', [App\Http\Controllers\StructuralPatternsController::class, 'Adapter'])->name('adapter');
Route::get('/structural/facade', [App\Http\Controllers\StructuralPatternsController::class, 'Facade'])->name('facade');
Route::get('/structural/bridge', [App\Http\Controllers\StructuralPatternsController::class, 'Bridge'])->name('bridge');
Route::get('/structural/composite', [App\Http\Controllers\StructuralPatternsController::class, 'Composite'])->name('composite');
Route::get('/structural/decorator', [App\Http\Controllers\StructuralPatternsController::class, 'Decorator'])->name('decorator');

// Behavioral patterns
Route::get('/behavioral/strategy', [App\Http\Controllers\BehavioralPatternsController::class, 'Strategy'])->name('strategy');
