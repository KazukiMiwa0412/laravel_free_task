<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body>
        <h1>ファイルアップロード</h1>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label>画像選択<input type="file" name="img" accept=".png,.jpg,.jpeg,image/png,image/jpg"></label>
            <br>
            <input type="text" value="商品名" name="pro_name">
            <br>
            <input type="submit" value="送信">
        </form>
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <h2>{{ $product -> pro_name }}</h2>
                    <img src="{{ 'storage/image/' . $product->file_name }}"  width="128" height="128">
                </div>
            @endforeach
        </div>
        
    </body>
</html>
