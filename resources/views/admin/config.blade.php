@extends('layouts.admin')

@section('title', 'Configurações')
    
@section('content')
<h1>Configurações</h1>

Meu nome é {{$nome2}} e eu tenho {{$idade2}} anos. <br><br>

@if($idade2 > 18 && $idade2 <= 60)
    Eu sou um adulto.
@elseif($idade2 > 60 && $idade2 <= 120)
    Eu sou um idoso.
@else
    Eu sou menor de idade.
@endif

<br><br>

@alert
    Alguma frase qualquer
@endalert

<br>

<label for="ListaBolo">Lista do Bolo</label><br>

<!--@if (count($lista) > 0)
<ul>
    @foreach ($lista as $item)
    <li>{{$item['nome']}}</li>
    @endforeach
</ul>
@endif-->

<!--Aqui forelse tem o empty que funciona como o else do if-->
<ul>
    @forelse ($lista as $item)
        <li>{{$item['nome']}} - {{$item['qt']}}</li>
    @empty
        <li>Não há  ingredientes</li>
    @endforelse
</ul>

<br>

<form method="POST">
    @csrf

    <label for="cidade">Cidade</label><br>
    <input type="text" name="cidade"><br><br>

    <label for="nome">Nome</label><br>
    <input type="text" name="nome"><br><br>

    <label for="idade">Idade<label><br>
    <input type="nuumber" name="idade"><br>
    <input type="submit" value="Enviar"><br><br>
</form>

<a href="/config/info">Informações</a>

@endsection