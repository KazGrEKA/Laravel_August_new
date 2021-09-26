@extends('layouts.admin')
@section('title') Редактировать новость - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Редактировать новость</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Редактировать новость</li>
            </ol>
            @include('inc.error')
        
            <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}" 
                                @if ($news->category_id === $category->id) 
                                    selected 
                                @endif
                            >
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <br>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-control" name="status" id="status">
                        <option @if($news->status === 'Draft') selected @endif> Draft </option>
                        <option @if($news->status === 'Published') selected @endif> Published </option>
                        <option @if($news->status === 'Blocked') selected @endif> Blocked </option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{!! $news->description !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <br>
        </div>
    </main>
@endsection 