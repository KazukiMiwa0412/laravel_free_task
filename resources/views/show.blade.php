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
        <p>{{ $product->pro_rest }}</p>
    </body>
</html>
