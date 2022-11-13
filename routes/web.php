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

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Ajax\SimpleFormController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

    Route::post('/simple-form', [SimpleFormController::class, 'index'])->name('simple-form');

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


