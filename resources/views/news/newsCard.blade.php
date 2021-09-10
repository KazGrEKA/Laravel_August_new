@extends('layout')

@section('style_link')
    <link href="../../css/app.css" rel="stylesheet">
@endsection

@section('title')
    @parent newsCard
@endsection

@section('page_content')
    <h2>Selected news</h2>
    <br>
    <article>
        <div class="news_img"></div>
        <br>
        <div>{{$news}}</div>
    </article>
    <br>
    <br>
@endsection
