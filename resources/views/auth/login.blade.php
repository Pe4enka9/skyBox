@extends('layouts.main')
@section('title', 'Авторизация')

@section('content')
    <h1 class="mb-3">Авторизация</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('login.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                    @error('email') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @error('password') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn btn-success">Войти</button>
            </form>
        </div>
    </div>
@endsection
