@extends('layouts.admin')
@section('title') Список источников - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Источники</h1>
            <a href="{{ route('admin.sources.create') }}" class="btn btn-primary" style="float: right">Добавить новостной источник</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список источников</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список источников
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Категория</th>
                            <th>Название источника</th>
                            <th>Ссылка на источник</th>
                            <th>Описание</th>
                            <th>Дата добавления</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($sourceList as $source)
                            <tr>
                                <td>{{ $source->id }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.filter', ['id' => $source->category_id]) }}">
                                        {{ optional($source->category)->title }}
                                    </a>
                                </td>
                                <td>{{ $source->title }}</td>
                                <td><a href="{{ $source->url }}">{{ $source->url }}</a></td>
                                <td>{{ $source->description }}</td>
                                <td>{{ $source->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                    <a href="javascript:;" class="delete" rel="{{ $source->id }}" style="font-size: 12px; color: red;">Уд.</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Источники отсутствуют</td>
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
    <script src="{{ asset('assets/admin/js/delete-source.js') }}"></script>
@endpush
