<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Halaman Utama (Home)
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
Route::get('/filter', [HomeController::class, 'filterMovies'])->name('home.filter');
Route::get('/search', [HomeController::class, 'searchMovies'])->name('home.search');
Route::get('/detailMovie/{id}', [HomeController::class, 'detailMovie'])->name('home.detailMovie');
Route::middleware('auth.redirect')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/movies', [DashboardController::class, 'movies'])->name('movies');
    Route::get('/movies/add', [DashboardController::class, 'formMovie'])->name('movies.add');
    Route::get('/movies/editMovie/{id}', [DashboardController::class, 'editMovie'])->name('movies.editMovie');
    Route::put('/movies/editMovie/{id}', [DashboardController::class, 'updateMovie'])->name('movies.updateMovie');
    Route::post('/movies/add', [DashboardController::class, 'addMovie'])->name('movies.add');
    Route::delete('/movies/{id}', [DashboardController::class, 'destroy'])->name('movies.destroy');
    Route::get('/movies/{id}', [DashboardController::class, 'show'])->name('movies.show');
    
    // categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/categories/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
    Route::get('/categories/add', [CategoryController::class, 'formCategory'])->name('categories.add');
    Route::post('/categories/add', [CategoryController::class, 'store'])->name('categories.store');
    
    // users
    Route::get('/listUser', [UserController::class, 'index'])->name('listUser');
});