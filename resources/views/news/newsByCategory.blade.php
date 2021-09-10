@extends('layout')

@section('style_link')
    <link href="../../css/app.css" rel="stylesheet">
@endsection

@section('title')
    @parent {{$category}} Category
@endsection

@section('page_content')
    <h2>News List by Category {{$category}}</h2>
    <br>
    @foreach($list as $id => $card)
        @php
            $url = route('news::card', ['id' => $id]);
        @endphp
        <div class="news_list-item">
            <div class="news_img-small col-xl-1"></div>
            <div class="col-xl-11"><a href='{{$url}}'>{{$card}}</a></div>
        </div>
        <br>
    @endforeach
@endsection
