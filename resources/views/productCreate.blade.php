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
        <h1>商品登録ページ</h1>
        <form>
            <div class="title-wrap">
                商品タイトル: <input type="text" name="name" placeholder="商品タイトル">
            </div>
            <div class="img-wrap">
                商品画像: <input type="file" name="img_path">
            </div>
            <div class="detail-wrap">
                商品説明: <textarea type="text" name="detail" cols="30" rows="10" placeholder="商品説明"></textarea>
            </div>
            <div class="fee-wrap">
                値段: <input type="text" name="fee" placeholder="10000">
            </div>
            <div class="submit-wrap">
                <input type="submit" name="register" value="登録する">
            </div>
        </form>
    </div>
</body>

</html>
