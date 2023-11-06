<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <!-- reset.css modern-css-reset -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
    <title>購入ありがとうございます</title>
</head>

<body>
    <div class="purchase-container">
        <h1>{{ Auth::user()->name }}さんご購入ありがとうございました</h1>
        <p>ご登録いただいたメールアドレスへ決済情報をお送りします。お手続き完了次第商品を発送します。</p>
        <a href="{{route('shop')}}">商品一覧へ</a>
    </div>
    <script src="{{ asset('js/common.js') }}"></script>
</body>

</html>
