<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// khi dùng resource và khởi tạo 1 pt mới thì nên đặt route đó lên treen route resource

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);
Route::resource('posts', PostController::class);
