@extends('master')

@section('title', 'Detalles de ' . $gift->name)

@section('content')
  <h2>{{$gift->price}}</h2>
  <div class="row">
    <a href="/gift/{{$gift->id}}/edit" class="bnt btn-primary col">Editar</a>
    <form method="POST" action="/gift/{{$gift->id}}" class="col">
      <input type="hidden" name="_METHOD" value="DELETE">
      <input type="submit" value="Borrar" class="btn btn-danger">
    </form>
    <a href="/gift" class="bnt btn-primary col">Listado de regalos</a>
  </div>
  @endsection