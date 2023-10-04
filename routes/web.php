<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {;
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix'=> 'category'], function(){
        Route::get('/all', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category_id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{category_id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        });

    Route::group(['prefix'=> 'product'], function(){
        Route::get('/all', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/{product_id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        });
});









