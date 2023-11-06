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

// Language Switcher Route 言語切替用ルートだよ
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

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

//商品登録
Route::post('/productCreate',[ShopController::class,'productStore'])->name('productStore');

//マイカートページ
Route::get('/mycart',[ShopController::class,'myCart'])->name('mycart')->middleware('auth');

//商品をマイカートに追加
Route::post('/addmycart',[ShopController::class,'addmycart'])->name('addmycart')->middleware('auth');

//マイカートに追加した商品の削除
Route::post('/cartdelete',[ShopController::class,'deleteCart'])->name('cartdelete');

//マイカートに追加した商品の購入
Route::post('/purchase',[ShopController::class,'purchase'])->name('purchase');

//購入ページをリロード
Route::get('/purchase',[ShopController::class,'redirect'])->name('shop');

//管理画面の表示
Route::get('/admin',[ShopController::class,'admin'])->name('admin')->middleware('auth');
