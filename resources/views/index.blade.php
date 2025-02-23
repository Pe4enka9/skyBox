@extends('layouts.main')
@section('title', 'Главная')

@section('content')
    <h1 class="mb-3">SkyBox</h1>
    <h3 class="mb-5">Облачное хранилище</h3>

    @if(!Auth::check())
        <a href="{{ route('login.index') }}" class="btn btn-primary">Войти</a>
        <a href="{{ route('register.index') }}" class="btn btn-secondary">Зарегистрироваться</a>
    @endif
@endsection
