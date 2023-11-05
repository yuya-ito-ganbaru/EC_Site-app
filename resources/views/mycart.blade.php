<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <!-- reset.css modern-css-reset -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
    <title>マイカート</title>
</head>

<body>
    <div class="mycart-container">
        <div>
            <h1>{{Auth::user()->name}}さんのカートの中身</h1>
            <p class="message">{{$message ?? ''}}</p>
            @if($my_carts->isNotEmpty())
            <div class="items">
                @foreach($my_carts as $my_cart)
                <div class="item">
                    <p>{{$my_cart->stock->name}}</p>
                    <p>{{number_format($my_cart->stock->fee)}}円</p>
                    <img src="{{asset('storage/images/'.$my_cart->stock->img_path)}}" alt="">

                    <form action="{{route('cartdelete')}}" method="post">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{$my_cart->stock->id}}">
                        <input type="submit" value="カートから削除する" class="delete" onClick="return confirm('本当に削除しますか？');">
                    </form>
                </div>
                @endforeach
            @else
            <p class="empty">カートは空っぽです</p>
            @endif
            </div>
            <a href="{{route('shop')}}" class="index">商品一覧ページ</a>
        </div>
    </div>
</body>

</html>
