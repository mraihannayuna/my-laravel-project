<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
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
// ? " / " adalah end point
// ? kalo ada " Route::get('welcome', [HelloController::class, 'welcome']); " " welcome " itu URI
Route::get('/', function () {
    return view('welcome');
});
// ? echo akan menampilkan semuanya
// ? return hanya menampilkan satu tidak bisa jika ada return dibawahnya ada return lagi
// Route::get('hai', function () {
//     echo "Hai Watashi wa Nayuna-desu";
// })

// ? yang ini manual

// ? yg ini pakai kutip
// Route::get('hello', 'App\Http\Controllers\HelloController@index');
// ? yg ini pakai array
// Route::get('welcome', [HelloController::class, 'welcome']);


// ? ini Resource jadi sudah ada get, post, etc...
// Route::resource('posts', PostController::class);

Route::resource('posting', PostController::class);
Route::get('menu', [AdminController::class, 'index']);



Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);







































