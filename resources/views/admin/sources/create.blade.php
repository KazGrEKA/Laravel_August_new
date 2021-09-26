@extends('layouts.admin')
@section('title') Добавить источник - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Добавить источник</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Добавить новостной источник</li>
            </ol>
            @include('inc.error')
        
            <form action="{{ route('admin.sources.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}" 
                                @if (old('category_id') === $category->id) selected @endif
                            >
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Название источника</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="url">Ссылка на источник</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <br>
        </div>
    </main>
@endsection 
@push('js')
    <script src="{{ asset('assets/admin/js/ckeditor-classic-editor.js') }}"></script>
@endpush