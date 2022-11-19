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
use App\Http\Controllers\BoardController;

use App\Http\Controllers\Ajax\Board\LoadBoardController;
use App\Http\Controllers\Ajax\Board\MyBoardsController;
use App\Http\Controllers\Ajax\Board\BoardCreateController;
use App\Http\Controllers\Ajax\Board\BoardEditController;
use App\Http\Controllers\Ajax\Board\BoardRemoveController;

use App\Http\Controllers\Ajax\Column\ColumnCreateController;
use App\Http\Controllers\Ajax\Column\ColumnRemoveController;
use App\Http\Controllers\Ajax\Column\ColumnEditController;
use App\Http\Controllers\Ajax\Column\ColumnChangeOrderController;

use App\Http\Controllers\Ajax\Card\CardCreateController;
use App\Http\Controllers\Ajax\Card\CardRemoveController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/quadro/{board_id}', [BoardController::class, 'index'])->name('board');

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
    
    Route::group(['prefix' => 'board', 'as' => 'board.'], function () {

        Route::get('/load-board/{board_id}', [LoadBoardController::class, 'index'])->name('load-board');

        Route::get('/my-boards', [MyBoardsController::class, 'index'])->name('my-boards');

        Route::get('/create', [BoardCreateController::class, 'index'])->name('create');
        Route::post('/create', [BoardCreateController::class, 'post'])->name('create');

        Route::get('/edit/{board_id}', [BoardEditController::class, 'index'])->name('edit');
        Route::post('/edit/{board_id}', [BoardEditController::class, 'post'])->name('edit');

        Route::get('/remove/{board_id}', [BoardRemoveController::class, 'index'])->name('remove');
        Route::post('/remove/{board_id}', [BoardRemoveController::class, 'post'])->name('remove');

    });

    Route::group(['prefix' => 'column', 'as' => 'column.'], function () {

        Route::get('/create/{board_id}', [ColumnCreateController::class, 'index'])->name('create');
        Route::post('/create/{board_id}', [ColumnCreateController::class, 'post'])->name('create');

        Route::get('/edit/{column_id}', [ColumnEditController::class, 'index'])->name('edit');
        Route::post('/edit/{column_id}', [ColumnEditController::class, 'post'])->name('edit');

        Route::get('/remove/{column_id}', [ColumnRemoveController::class, 'index'])->name('remove');
        Route::post('/remove/{column_id}', [ColumnRemoveController::class, 'post'])->name('remove');

        Route::get('/change-order/{column_id}/{direction}', [ColumnChangeOrderController::class, 'index'])->name('change-order');

    });

    Route::group(['prefix' => 'card', 'as' => 'card.'], function () {

        Route::get('/create/{column_id}', [CardCreateController::class, 'index'])->name('create');
        Route::post('/create/{column_id}', [CardCreateController::class, 'post'])->name('create');

        Route::get('/remove/{card_id}', [CardRemoveController::class, 'index'])->name('remove');
        Route::post('/remove/{card_id}', [CardRemoveController::class, 'post'])->name('remove');

    });

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


