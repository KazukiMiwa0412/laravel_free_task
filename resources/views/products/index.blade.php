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
            
            .search{
                margin:20px;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
        
    </head>
    <body>
        
        <form action="{{ route('products.search') }}" method="get" class="search">
            <input type="text" name="search" placeholder="search" value="">
            <button type="submit">検索</button>
            @error('search')
                <span class="" role="alert" style="color:red;">
                    <strong><br>{{ $message }}</strong>
                </span>
            @enderror
        </form>
        
        <div class="products">
            @foreach ($products as $product)
                <div class="product">
                    <img src="{{ '../storage/image/' . $product->file_name }}"  width="128" height="128">
                    <p><a href="{{ route('products.show',$product->id) }}">{{ $product -> pro_name }}</a></p>
                </div>
            @endforeach
        </div>
        
    </body>
</html>

@endsection