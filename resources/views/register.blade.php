@extends('layouts.admin')

@section('title', 'Cadastro')

@section('content')

    @if ($errors->any())
        @alert
            @foreach ($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
            @endforeach
        @endalert
    @endif

    <form method="POST">
        @csrf

    <input type="text" name="name" placeholder="Digite seu nome" value="{{old('name')}}">
    <input type="email" name="email" placeholder="Digite um e-mail" value="{{old('email')}}"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>
        <input type="password" name="password_confirmation" placeholder="Confirme a sua senha"><br>
        <input type="submit" value="Cadastrar">
    </form>
    
@endsection