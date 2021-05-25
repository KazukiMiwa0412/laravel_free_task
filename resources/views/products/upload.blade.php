@extends('layouts.layout')
@section('child')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Styles -->
        <style>
            .products{
                display: grid;
                grid-template-columns: 200px 200px ;
            }
            
            .store label{
                padding:20px;
            }
            .store input{
                margin:10px;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
        
    </head>
    <body>
        
        <h1>ファイルアップロード</h1>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="store">
            @csrf
            <label>画像選択<br><input type="file" name="img" accept=".png,.jpg,.jpeg,image/png,image/jpg"></label>
            <br>
            <input type="text" value="商品名" name="pro_name">
            <br>
            <input type="submit" value="送信">
        </form>
    </body>
</html>

@endsection