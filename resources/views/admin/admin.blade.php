@extends('layout')

@section('title')
    @parent Admin Panel
@endsection

@section('page_content')
    <h2>Admin Panel</h2>
    <br>
    <p><a href="{{ route('admin::add') }}">Add news</a></p>
    <p><a href="#">Update news</a></p>
    <p><a href="#">Delete news</a></p>
@endsection
