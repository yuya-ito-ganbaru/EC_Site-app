<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class ShopController extends Controller
{
    public function index() {
        return view('shop');
    }

    public function productCreate() {
        return view('productCreate');
    }

    public function productStore(Stock $stock,Request $request) {
        $stock->store($request);
        return back()->with('message','商品を追加しました');
    }
}
