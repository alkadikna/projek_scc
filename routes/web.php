<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/home',[HomeController::class, 'index'])->name('dashboard');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',function(){return redirect('/home');});

Route::get('/search',[HomeController::class, 'search']);

Route::get('/detail/{id}',[HomeController::class, 'detail'])->name('detail');

Route::post('/addcart/{id}',[HomeController::class, 'addcart']);

Route::get('/category/{category}', [HomeController::class, 'search']);

Route::get('/checkout',[HomeController::class, 'checkout']);

Route::get('/delete/{id}',[HomeController::class, 'deletecart']);

Route::patch('/update/{id}',[HomeController::class, 'updatecart']);

Route::post('/order',[HomeController::class, 'order']);

Route::get('/category/{category}/search', [HomeController::class, 'search']);

Route::get('/order-history', [HomeController::class, 'orderHistory'])->name('history');

Route::get('/detail-history/{id}', [HomeController::class, 'detailHistory'])->name('detailHistory');

require __DIR__.'/auth.php';

