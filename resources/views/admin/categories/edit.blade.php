@extends('layouts.admin')
@section('title') Редактировать категорию - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Редактировать категорию</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Редактировать категорию</li>
            </ol>
            @include('inc.error')
        
            <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="color">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $category->color }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="source">Внешний источник</label>
                    <input type="text" class="form-control" id="source" name="news_source" value="{{ $category->news_source }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $category->description }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <br>
        </div>
    </main>
@endsection 