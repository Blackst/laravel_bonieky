@extends('layouts.admin')

@section('title', 'Edição de Tarefas')
    
@section('content')
 <h1>Edição</h1>

 @if (session('warning')) //Tem que ativar o alert dentro do provider
    @alert
        {{ session('warning')}}
    @endalert
 @endif

 <form method="POST">
     @csrf

     <label for="titulo">
         Titulo: <br>
         <input type="text" name="titulo" value="{{$data->titulo}}">
    </label>
     
    <input type="submit" value="Salvar">
 </form>
@endsection