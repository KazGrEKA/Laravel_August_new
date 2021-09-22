@extends('layouts.admin')
@section('title') Учетные записи - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Пользователи</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Управление учетными записями</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список пользователей
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Имя</th>
                                <th>E-mail</th>
                                <th>Роль</th>
                                <th>Дата регистрации</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($userList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_admin === true)
                                        Администратор
                                    @else 
                                        Пользователь
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                @if ($user->id != $currentUser)
                                    <td>
                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="font-size: 12px; color: red;">Уд.</a>
                                    </td>
                                @else 
                                    <td>Текущий пользователь</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
    <script src="{{ asset('assets/admin/js/delete-user.js') }}"></script>
@endpush
