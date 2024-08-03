@extends('layouts.header')
@Section('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Document</title>
</head>
<body>
    <form action="/" method='POST' enctype="multipart/form-data">
        @csrf
        <input type="file" name='file' placeholder="Excel файл">
        <button type="submit">Подтвердить</button>
    </form>
    @if(isset($elements))
    <div class='products-list'>
        @foreach($elements as $element)
            <div class='catalog-product'>
                <div class='element-image'>
                    <img src="https://c.dns-shop.ru/thumb/st4/fit/200/200/051164667bde5b6ffa6bb07bd5ef183f/00531b8fd5741f428c0666e46e44347488eed017c0dc5aae2aeae5809796e3fc.jpg.webp" alt="">
                </div>
                <div class='product-text'>
                    <p class='product-title'>{{$element['name']}}</p>
                    <p class='main'>{{$element['description']}} </p>
                </div>
                <div class='product-pricing'>
                    <div class='product-price'>
                        {{$element['price']}} руб.
                    </div>
                    <button class='product-buy-button'>Купить</button>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</body>
</html>
@endsection