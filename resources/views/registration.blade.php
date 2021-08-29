<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Task manager</title>
</head>
<body>
    <h1>Регистрация</h1>
    @extends('layouts.layout')
    <form action="{{ route('user.registration') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="login" class="col-md-4 col-form-label text-md-right">Логин</label>
            <div class="col-md-6">
                <input type="text" id="login" class="form-control" name="login" required />
                @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
            <div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" required />
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
            <div class="col-md-6">
                <input type="text" id="name" class="form-control" name="name" required />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="lastName" class="col-md-4 col-form-label text-md-right">Фамилия</label>
            <div class="col-md-6">
                <input type="text" id="lastName" class="form-control" name="lastName" required />
                @error('lastName')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="patronymic" class="col-md-4 col-form-label text-md-right">Отчество</label>
            <div class="col-md-6">
                <input type="text" id="patronymic" class="form-control" name="patronymic" required />
                @error('patronymic')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Регистрация
            </button>
        </div>
    </form>
</body>