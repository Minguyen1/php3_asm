<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\CheckAuth;
use App\Models\Categories;
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

Route::get('/', [ProductsController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoriesController::class, 'show']);
Route::get('/product/show/{id}', [DetailController::class, 'show']);
Route::get('search', [DetailController::class, 'search'])->name('search');

Route::middleware('auth', CheckAuth::class)->prefix('admin/product')->group(function(){
    Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.user');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');