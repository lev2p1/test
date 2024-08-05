
@extends('layouts.header')
@Section('header')

<head>
    <script src="{{asset('js/product.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
</head>
<body onload="startTheme(), currentSlide(1)" id="body" class="theme">
    <main class="">
        <div class="section">
            <p class="left prop_title"></p>
        </div>
        <div class="flex-row flex flex-wrap prop_main-img-wrap">
            <div class="main-image_wrap flex horiz-center vert-center">
                
                <div class="img-switch-button-wrap prev flex vert-center horiz-center">
                    <a href="javascript:plusImage(-1)" class="img-switch-button">
                        <svg class="page-svg" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5912 3.225L13.1079 1.75L4.86621 10L13.1162 18.25L14.5912 16.775L7.81621 10L14.5912 3.225Z"></path>
                        </svg>
                    </a>
                </div>
                <div id="img-buttons-wrap" class="img-buttons-wrap">
                    <a class="any" href="javascript:lightboxImg()">
                        <img class="prop_main-img" id="main-image" src='{{asset(Storage::url($images[0]['value']))}}'>
                </a>
                    </div>
                    <div class="img-switch-button-wrap next flex vert-center horiz-center">
                        <a href="javascript:plusImage(1)" class="img-switch-button">
                            <svg class="page-svg" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.4082 16.775L6.8832 18.25L15.1332 10L6.8832 1.75L5.4082 3.225L12.1832 10L5.4082 16.775Z"></path>
                            </svg>
                        </a>
                    </div>
            </div>
            <div class="flex flex-nowrap flex-col vert-center prop_img-select-wrap">
                @php
                    $max = 0;
                @endphp
                @foreach($images as $image)
                        <img class="prop_img-select" onclick="currentSlide({{$loop->index}}, this)" src={{Storage::url($image->value)}}>

                    @php
                       $max += 1; 
                    @endphp
                    
                @endforeach
            </div>
        </div>
        <div class="left section">
            <div class="prop-listing-price-wrap">
                <p class="prop-listing-price">{{$element->price}} руб.</p>
            </div>
            <div class="prop-listing-specs-wrap">
                @foreach ($adds as $key => $value)
                @php
                    $val = str_replace('"', ' ', trim($value['value'], '{""}'));
                @endphp
                    <p class="theme prop-listing-specs">{{ $val}}</p>
                @endforeach
            </div>
            
    </main>
    <div id="lightbox" open="false" class="lightbox-container">
        <div id="lightbox-wrap" class="lightbox-container_wrap">
            <div class="lightbox-container_img-wrap flex vert-center horiz-center">
                <img id="lightbox-img" class="lightbox-container_img" src="">
            </div>
            <span onclick="lightbox(0)" class="lightbox-cross">&times;</span>
        </div>
    </div>
</body>

@endsection