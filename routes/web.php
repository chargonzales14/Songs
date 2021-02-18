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

use App\Http\Controllers\SongController;
Route::get('view-songs', [SongController::class, 'index']);
Route::post('store-song', [SongController::class, 'store']);
Route::get('download-song/{song_id}', [SongController::class, 'downloadSong']);