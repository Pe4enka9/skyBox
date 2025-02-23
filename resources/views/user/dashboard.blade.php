@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('content')
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
            grid-gap: 30px;
        }
    </style>

    <h1 class="mb-3">Личный кабинет</h1>

    <div class="mb-3">
        <a href="{{ route('file.upload') }}" class="btn btn-primary">Загрузить файл</a>
        <a href="{{ route('folders.index') }}" class="btn btn-primary">Создать папку</a>
    </div>

    <form action="{{ route('logout') }}" method="post" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-secondary">Выйти</button>
    </form>

    <div class="grid">
        @foreach($files as $file)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $file->name }}</h5>
                    <p class="card-text">Пользователь: {{ $file->user_id }}</p>
                    <p class="card-text">Папка: {{ $file->folder_id ?? 'Нет' }}</p>
                    <p class="card-text">Путь: {{ $file->path }}</p>
                    <p class="card-text">Размер: {{ round($file->size / 1000, 2) }} Кбайт</p>
                    <p class="card-text">Тип: {{ $file->type }}</p>
                    <p class="card-text">Расширение: {{ $file->extension }}</p>
                    <p class="card-text">Создан: {{ $file->created_at }}</p>
                    <p class="card-text">Обновлен: {{ $file->updated_at }}</p>
{{--                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        @endforeach
    </div>

    {{--    <table class="table table-striped">--}}
    {{--        <thead>--}}
    {{--        <tr>--}}
    {{--            <th>Пользователь</th>--}}
    {{--            <th>Папка</th>--}}
    {{--            <th>Имя файла</th>--}}
    {{--            <th>Путь</th>--}}
    {{--            <th>Размер</th>--}}
    {{--            <th>Тип</th>--}}
    {{--            <th>Расширение</th>--}}
    {{--            <th>Создан</th>--}}
    {{--            <th>Обновлен</th>--}}
    {{--        </tr>--}}
    {{--        </thead>--}}
    {{--        <tbody>--}}
    {{--        @foreach($files as $file)--}}
    {{--            <tr>--}}
    {{--                <td>{{ $file->user_id }}</td>--}}
    {{--                <td>{{ $file->folder_id ?? 'Нет' }}</td>--}}
    {{--                <td>{{ $file->name }}</td>--}}
    {{--                <td>{{ $file->path }}</td>--}}
    {{--                <td>{{ round($file->size / 1000, 2) }} Кбайт</td>--}}
    {{--                <td>{{ $file->type }}</td>--}}
    {{--                <td>{{ $file->extension }}</td>--}}
    {{--                <td>{{ $file->created_at }}</td>--}}
    {{--                <td>{{ $file->updated_at }}</td>--}}
    {{--            </tr>--}}
    {{--        @endforeach--}}
    {{--        </tbody>--}}
    {{--    </table>--}}
@endsection
