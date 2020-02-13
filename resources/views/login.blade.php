@extends('layouts.admin')

@section('title', 'login')

@section('content')

    @if (session('warning'))
        @alert
            {{session('warning')}}
        @endalert
    @endif

    <form method="POST">
        @csrf

        <input type="email" name="email" placeholder="Digite um e-mail"><br>
        <input type="password" name="password" placeholder="Digite uma senha"><br>
        <input type="submit" value="Entrar">
    </form>
    
@endsection