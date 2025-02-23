@extends('layouts.main')
@section('title', 'Папки')

@section('content')
    <h1 class="mb-3">Папки</h1>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <div class="row mb-5">
        <div class="col-3">
            <form action="{{ route('folders.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Название папки</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Создать</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            @if($folders->isEmpty())
                <h4>Папок пока что нет</h4>
            @else
                <ul class="list-group">
                    @foreach($folders as $folder)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $folder->name }}

                            <form action="{{ route('folders.destroy', $folder) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
