<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\BrandController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);
Route::resource('posts', PostController::class);
Route::resource('students', StudentController::class);
Route::resource('pros', ProController::class);
Route::resource('clients', ClientController::class);

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::prefix('brands')
            ->as('brands.')
            ->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('index');
                Route::get('create', [BrandController::class, 'create'])->name('create');
                Route::post('store', [BrandController::class, 'store'])->name('store');
                Route::get('{id}', [BrandController::class, 'show'])->name('show');
                Route::get('{id}/edit', [BrandController::class, 'edit'])->name('edit');
                Route::put('{id}', [BrandController::class, 'update'])->name('update');
                Route::delete('{id}', [BrandController::class, 'delete'])->name('delete');
                Route::post('deleteMany', [BrandController::class, 'deleteMany'])->name('deleteMany');
            });
    });
Route::view('master', 'layouts.dashboard');