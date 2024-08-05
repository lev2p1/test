@extends('layouts.header')
@Section('header')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/variables.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <title>Document</title>
</head>
<body>
    <!---<form action="/" method='POST' enctype="multipart/form-data">
        @csrf
        <input type="file" name='file' placeholder="Excel файл">
        <button type="submit">Подтвердить</button>--->
    </form>
    @if(isset($elements))
    <div class='products-list'>
        @foreach($elements as $element)
            <a class='catalog-product' href="product/{{$element->id}}">
                <img src="{{asset(Storage::url($element['upacovka']))}}" class='product-main-image' alt="">
                <div class='product-pricing'>
                    <div class='product-price'>
                        {{$element['price']}} руб.
                    </div>
                </div>
                <div class='product-text'>
                    <p class='product-title' >{{$element['name']}}</p>
                </div>                
            </a>
        @endforeach
    </div>
    <div class='pagination-container'>
        {{$elements->links()}}
    </div>
    @endif
    
</body>
</html>
@endsection