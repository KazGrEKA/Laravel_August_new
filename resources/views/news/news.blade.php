@extends('layout')

@section('title')
    @parent Categories
@endsection

@section('page_content')
    <h2>News Categories</h2>
    <br>
    <div class="news-tiles">
        @foreach($categories as $id => $category)
            @php
                $url = route('news::list', ['category' => $id]);
            @endphp
            <div class="news-tile">
                <a href='{{$url}}'>{{$category}}</a>
            </div>
        @endforeach
    </div>
@endsection
