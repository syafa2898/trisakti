<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);
Route::get('/categories-datatables', [CategoryController::class, 'datatables'])->name('categories.datatables');

Route::resource('inventories', InventoryController::class);
Route::get('/inventories-datatables', [InventoryController::class, 'datatables'])->name('inventories.datatables');

Route::resource('rooms', RoomController::class);
Route::get('/rooms-datatables', [RoomController::class, 'datatables'])->name('rooms.datatables');

Route::resource('transactions', TransactionController::class);
Route::get('/transactions-datatables', [TransactionController::class, 'datatables'])->name('transactions.datatables');

Route::middleware('role:admin')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
