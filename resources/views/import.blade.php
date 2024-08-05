@extends('layouts.header')
@Section('header')
    <form action="/product/import" method='POST' enctype="multipart/form-data">
        @csrf
        <div class='import-form'>
            <input type="file" name='file' class='import-input' placeholder="Excel файл">
            <button type="submit">Подтвердить</button>
        </div>
    </form>
@endsection