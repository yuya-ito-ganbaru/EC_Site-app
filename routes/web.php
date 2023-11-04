<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//require __DIR__ .'/auth.php';

//商品一覧ページ
Route::get('/index',[ShopController::class,'index'])->name('shop');

//商品登録ページ
Route::get('/productCreate',[ShopController::class,'productCreate'])->name('productCreate');
