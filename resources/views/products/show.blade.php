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
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
        
    </head>
    <body>
        <h1>{{ $product->pro_name }}</h1>
        <img src="{{ '../storage/image/' . $product->file_name }}"  width="512" height="512">
        @if ($product->pro_rest > 0)
            <dev class="rest_content">
                <h2>残り: {{ $product->pro_rest }}</h2>
                <form action="{{ route('products.update',$product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="num_of_purchase">
                    <input type="submit" value="送信">
                    @error('num_of_purchase')
                        <span class="" role="alert" style="color:red;">
                            <strong><br>{{ $message }}<br></strong>
                        </span>
                    @enderror
                </form>
            </dev>
        @else
            <h2>在庫なし</h2>
        @endif
    </body>
</html>

@endsection