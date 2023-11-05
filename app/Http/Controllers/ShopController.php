<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;

class ShopController extends Controller
{
    public function index(Stock $stock) {
        $stocks = $stock->stockDisplay();
        return view('shop',compact('stocks'));
    }

    public function productCreate() {
        return view('productCreate');
    }

    public function productStore(Stock $stock,Request $request) {
        $stock->store($request);
        return back()->with('message','商品を追加しました');
    }

    public function myCart(Cart $cart) {
        $data = $cart->showCart();
        return view('mycart',$data);
    }

    public function addMycart(Request $request,Cart $cart) {
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);

        $data = $cart->showCart();

        return view('mycart',$data)->with('message',$message);
    }

    public function deleteCart(Request $request,Cart $cart) {
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        $data = $cart->showCart();

        return view('mycart',$data)->with('message',$message);
    }
}
