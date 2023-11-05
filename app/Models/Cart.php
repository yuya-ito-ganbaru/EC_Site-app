<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'user_id'
    ];

    public function addCart($stock_id) {
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);

        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }
        return $message;
    }

    public function stock() {
        return $this->belongsTo(Stock::class);
    }

    public function showCart() {
        $user_id = Auth::id();
        $data['my_carts'] = Cart::where('user_id',$user_id)->get();

        return $data;
    }

    public function deleteCart($stock_id) {
        $user_id = Auth::id();
        $delete = $this->where('user_id',$user_id)->where('stock_id',$stock_id)->delete();
        if ($delete > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }
}
