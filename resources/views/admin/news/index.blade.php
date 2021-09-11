@extends('layouts/admin')
@section('title') Список новостей - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Новости</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="float: right">Добавить новость</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список новостей</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список новостей
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th>Описание</th>
                            <th>Дата добавления</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($newsList as $news)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $news['title'] }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.filter', ['id' => $news['category_id']]) }}">
                                        {{ $categoriesList[$news['category_id']] }}
                                    </a>
                                </td>
                                <td>{{ $news['description'] }}</td>
                                <td>{{ now()->format('d-m-Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', ['news' => $loop->iteration]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                    <a href="javascript:;" style="font-size: 12px; color: #ff0000;">Уд.</a></td>
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
