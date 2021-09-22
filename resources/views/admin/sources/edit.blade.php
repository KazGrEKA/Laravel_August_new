@extends('layouts.admin')
@section('title') Редактировать источник - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Редактировать источник</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Редактировать новостной источник</li>
            </ol>
            @include('inc.error')
        
            <form action="{{ route('admin.sources.update', ['source' => $source]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}" 
                                @if ($source->category_id === $category->id) 
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
                    <label for="title">Название источника</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $source->title }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="url">Ссылка на источник</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $source->url }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $source->description }}</textarea>
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