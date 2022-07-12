<?php

use App\Http\Controllers\PersonController;
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

require __DIR__.'/auth.php';

Route::get('/', [PersonController::class, 'create'])->name('home');
Route::post('/add-person', [PersonController::class, 'store'])->name('add-person');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [PersonController::class, 'index'])->name('home');
    Route::resource('persons', PersonController::class)->except('show');
});
