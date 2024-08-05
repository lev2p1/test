@extends('layouts.header')
@Section('header')


<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/import.js')}}"></script>

    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<div>
    <form method="post" id='form' action='/product/import' enctype="multipart/form-data">
        @csrf
        <label class="input-file">
            <input type="file" name="file">		
            <span>Выберите файл</span>
        </label>        
        <div class="button">
            <span class="submit">Submit</span>
            <span class="loading"><i class="fa fa-refresh"></i></span>
            <span class="check"><i class="fa fa-check"></i></span>
        </div>
    </form>
</div>
    
@endsection