@extends('layouts.admin')
@section('title') Список новостей ({{ $category->title }}) - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Все новости из категории "{{ $category->title }}"</h1>
            <a href="{{ route('admin.news.parse', ['categoryId' => $category->id]) }}" class="btn btn-primary" style="float: right">Добавить новости из Yandex</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список новостей</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список новостей
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Дата добавления</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($category->news as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->description }}</td>
                                <td>{{ $news->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                    <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="font-size: 12px; color: red;">Уд.</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Новостей не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
    <script src="{{ asset('assets/admin/js/delete-news.js') }}"></script>
@endpush
