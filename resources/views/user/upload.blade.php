@extends('layouts.main')
@section('title', 'Загрузка файлов')

@section('content')
    <h1 class="mb-3">Загрузка файлов</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label">Файлы</label>
                    <input type="file" name="file" id="file"
                           class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}">
                    @error('file') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                @if(session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif

                <button type="submit" class="btn btn-success">Загрузить</button>
            </form>
        </div>
    </div>
@endsection
