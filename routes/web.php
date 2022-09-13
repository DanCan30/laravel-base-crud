<?php

use App\Models\Comic;
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
Route::get('/', function() {
    $comics = Comic::all();
    return view("guest.home", compact("comics"));
})->name("guest.home");

Route::get('/admin', "ComicController@index")->name("admin.index");

Route::get("/comics/{comic}", "ComicController@show")->name("comic.show");
