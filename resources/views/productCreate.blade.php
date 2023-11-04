<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <!-- reset.css modern-css-reset -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />
    <title>商品登録ページ</title>
</head>

<body>
    <div class="productCreate-container">
        <!------- 商品登録完了メッセージ ------->
        @if(session('message'))
        <div class="flash">
            {{session('message')}}
        </div>
        @endif

        <!------- 商品登録エラーメッセージ ------->
        @if($errors->any())
        <ul class="error">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <h1>商品登録ページ</h1>
        <form action="{{route('productStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="title-wrap">
                商品タイトル: <input type="text" name="name" placeholder="商品タイトル" value="{{old('name')}}">
            </div>
            <div class="img-wrap">
                商品画像: <input type="file" name="img_path" accept="image/jpg,image/png">
            </div>
            <div class="detail-wrap">
                商品説明: <textarea type="text" name="detail" cols="30" rows="10" placeholder="商品説明">{{old('detail')}}</textarea>
            </div>
            <div class="fee-wrap">
                値段: <input type="text" name="fee" placeholder="10000" value="{{old('fee')}}">円
            </div>
            <div class="submit-wrap">
                <input type="submit" name="register" value="登録する">
            </div>
        </form>
    </div>
</body>

</html>
