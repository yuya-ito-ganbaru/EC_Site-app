<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <!-- reset.css modern-css-reset -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
    <title>商品一覧</title>
</head>

<body>
    <div class="shop-container">
        <h1>商品一覧</h1>
        <div class="item-container">
            <!--商品表示部分-->
            @foreach($stocks as $stock)
            <div class="item">
                <p>{{$stock->name}}<br>{{$stock->fee}}円</p>
                <div>
                    <img src="{{asset('storage/images/'.$stock->img_path)}}" alt="">
                </div>
                <p>{{$stock->detail}}</p>

                <form action="{{route('addmycart')}}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="stock_id" value="{{$stock->id}}">
                    <input type="submit" value="カートに入れる" class="addcart">
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
