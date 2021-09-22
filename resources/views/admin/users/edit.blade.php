@extends('layouts.admin')
@section('title') Редактирование учетной записи - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Редактировать учетную запись</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Редактировать данные пользователя</li>
            </ol>
            @include('inc.error')
        
            <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="color">E-mail адрес</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="role">Роль</label>
                    <select class="form-control" name="is_admin" id="role">
                        <option value="1" @if($user->is_admin === true) selected @endif>Администратор</option>
                        <option value="0" @if($user->is_admin === false) selected @endif>Пользователь</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <br>
        </div>
    </main>
@endsection 