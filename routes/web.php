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

use App\Http\Controllers\Ajax\Board\MyBoardsController;
use App\Http\Controllers\Ajax\Board\BoardCreateController;
use App\Http\Controllers\Ajax\Board\BoardEditController;
use App\Http\Controllers\Ajax\Board\BoardRemoveController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/adx', function() {
    echo 'TESTE';
})->name('adx');

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

    Route::post('/simple-form', [SimpleFormController::class, 'index'])->name('simple-form');

    Route::group(['prefix' => 'board', 'as' => 'board.'], function () {

        Route::get('/my-boards', [MyBoardsController::class, 'index'])->name('my-boards');

        Route::get('/create', [BoardCreateController::class, 'index'])->name('create');
        Route::post('/create', [BoardCreateController::class, 'post'])->name('create');

        Route::get('/edit/{board_id}', [BoardEditController::class, 'index'])->name('edit');
        Route::post('/edit/{board_id}', [BoardEditController::class, 'post'])->name('edit');

        Route::get('/remove/{board_id}', [BoardRemoveController::class, 'index'])->name('remove');
        Route::post('/remove/{board_id}', [BoardRemoveController::class, 'post'])->name('remove');

    });

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


